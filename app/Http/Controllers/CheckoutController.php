<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\Transactiondetail;
use Illuminate\Http\Request;

use Exception;
use Midtrans\Snap;
use Midtrans\Config;

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
    }
}
