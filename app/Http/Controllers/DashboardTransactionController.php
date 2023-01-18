<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Transactiondetail;
use Illuminate\Http\Request;

class DashboardTransactionController extends Controller
{
    //
    public function index()
    {
        $buyproduct = Transactiondetail::whereHas('transaction', function ($transaction) {
            $transaction->where('user_id', auth()->user()->id);
        })->get();

        $sellproduct = Transactiondetail::whereHas('product', function ($product) {
            $product->where('user_id', auth()->user()->id);
        })->get();
       

        return view('pages.dashboard-transaction', [
            'title' => 'Web Store | Dashboard Transaction',
            'sellproduct' => $sellproduct,
            'buyproduct' => $buyproduct
        ]);
    }
    public function detail($id)
    {
        // $transaction = Transactiondetail::where('id', $id)->get();
        $transaction = Transactiondetail::findOrFail($id);

        return view('pages.dashboard-transaction-detail', [
            'title' => 'Web Store | Dashboard Transaction Detail',
            'transaction' => $transaction
        ]);
    }

    public function update(Request $request , $id)
    {

        
        $data = $request->all();
        
        $item = Transactiondetail::findOrFail($id);

        $item->update($data);

        return redirect()->route('dashboard-transaction-detail', $id);

    }
}
