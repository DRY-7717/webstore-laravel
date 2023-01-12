<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        
        return view('pages.category', [
            'title' => 'Webstore Laravel | Category',
            'categories' => Category::all(),
            'products' => Product::latest()->paginate(32)->withQueryString()
        ]);
    }
    public function show(Category $category)
    {

        $products = Product::where('category_id', $category->id)->paginate(32)->withQueryString();

        return view('pages.category', [
            'title' => 'Webstore Laravel | Detail Category',
            'categories' => Category::all(),
            'products' => $products,
        ]);
    }
}
