<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Galleryproduct;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {        
        

   

        return view('pages.home',[
            'title' => 'Webstore Laravel',
            'products' => Product::latest()->take(8)->get(),
            'categories' => Category::all()
        ]);
    }
}
