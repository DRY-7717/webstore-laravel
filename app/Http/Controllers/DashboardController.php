<?php

namespace App\Http\Controllers;

use App\Models\Transactiondetail;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $transaction = Transactiondetail::whereHas('transaction', function ($transaction)
        {
            $transaction->where('user_id', auth()->user()->id);
        });

        // return $transaction->get();

        $revenue = $transaction->get()->reduce(function($carry,$item){
            return $carry + $item->price;
        });
        return view('pages.dashboard',[
            'title' => 'Web store | Dashboard',
            'customer' => User::count(),
            'revenue' => $revenue,
            'transaction_count' => $transaction->count(),
            'transaction_data' => $transaction->get(),

            
        ]);
    }
}
