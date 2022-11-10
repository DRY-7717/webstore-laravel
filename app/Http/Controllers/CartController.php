<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function index()
    {
        return view('pages.cart', [
            'title' => 'Webstore Laravel | Cart Product'
        ]);
    }
    public function success()
    {
        return view('pages.success', [
            'title' => 'Webstore Laravel | Transaction Success'
        ]);
    }
}

