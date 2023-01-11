<?php

namespace App\Http\Controllers;

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
}
