<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        return view('pages.category', [
            'title' => 'Webstore Laravel | Category'
        ]);
    }

    public function show(Category $category)
    {
        return $category;
    }
}
