<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\Transactiondetail;
use Illuminate\Http\Request;

use Exception;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Notification;

class CheckoutController extends Controller
{
    //
    public function process(Request $request)
    {
        // save user data
        $user = auth()->user();
        $user->update($request->except('total_price'));

        // proses checkout
        $code = 'STORE-' . mt_rand(0000, 9999);
        $carts = Cart::where('user_id', auth()->user()->id)->get();

        // Transaction Create
        $transaction = Transaction::create([
            'user_id' => auth()->user()->id,
            'insurance_price' => 0,
            'shipping_price' => 0,
            'total_price' => $request->total_price,
            'transaction_status' => 'PENDING',
            'code' => $code,

        ]);

        foreach ($carts as $cart) {
            $trx = 'TRX-' . mt_rand(0000, 9999);

            Transactiondetail::create([
                'transaction_id' => $transaction->id,
                'product_id' => $cart->product->id,
                'price' => $cart->product->price,
                'transaction_status' => 'PENDING',
                'code' => $trx,
                'resi' => '',
            ]);
        }

        Cart::where('user_id', auth()->user()->id)->delete();
        // Konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // bikin data untuk dikirim ke midtrans
        $midtrans = [
            'transaction_details' => [
                "order_id" => $code,
                "gross_amount" => (int) $request->total_price,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
                'phone' => auth()->user()->phone_number,
            ],
            'enable_payment' => [
                'gopay', 'permata_va', 'bank_transfer'
            ],
            'vtweb' => []
        ];

        try {
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

            return redirect($paymentUrl);

        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }
    public function callback(Request $request)
    {
        // set configurasi midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // instance midtrans notifications
        $notification = new Notification();

        // assign ke variable untuk memudahkan coding
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud =$notification->fraud_type;
        $order_id = $notification->order_id;
        // cari transaksi berdasarkan id

        $transaction = Transaction::findOrfail($order_id);
        // handle notifikcation status
        if ($status == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    $transaction->transaction_status = 'PENDING';
                }else{
                    $transaction->transaction_status = 'SUCCESS';
                }
            }
        }else if($status == 'settlement'){
            $transaction->transaction_status = 'SUCCESS';
        } else if ($status == 'pending') {
            $transaction->transaction_status = 'PENDING';
        } else if ($status == 'deny') {
            $transaction->transaction_status = 'CANCELLED';
        } else if ($status == 'expire') {
            $transaction->transaction_status = 'CANCELLED';
        } else if ($status == 'cancel') {
            $transaction->transaction_status = 'CANCELLED';
        }
        // simpan transaction

        $transaction->save();
    }
}
