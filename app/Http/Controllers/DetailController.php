<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    //
    public function index(Product $product)
    {    
        return view('pages.detail', [
            'title' => 'Webstore Laravel | Detail Product',
            'product' => $product,
        ]);
    }

    public function add( Request $request ,$id)
    {
        $data = [
            'product_id' => $id,
            'user_id' => auth()->user()->id,
        ];
        Cart::create($data);
        return redirect()->route('cart');
    }

}
