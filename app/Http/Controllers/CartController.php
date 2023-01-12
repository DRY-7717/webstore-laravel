<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function index()
    {
        return view('pages.cart', [
            'title' => 'Webstore Laravel | Cart Product',
            'carts' => Cart::where('user_id', auth()->user()->id)->latest()->get(),
        ]);
    }
    public function success()
    {
        return view('pages.success', [
            'title' => 'Webstore Laravel | Transaction Success'
        ]);
    }
    public function destroy($id)
    {
        Cart::destroy($id);
        return redirect()->route('cart');
    }
}

