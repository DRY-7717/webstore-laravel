<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardProductController extends Controller
{
    //
    public function index()
    {
        return view('pages.dashboard-product', [
            'title' => 'Web store | Dashboard Product'
        ]);
    }
    public function detail()
    {
        return view('pages.dashboard-product-detail', [
            'title' => 'Web store | Dashboard Product Detail'
        ]);
    }
    public function create()
    {
        return view('pages.dashboard-product-create', [
            'title' => 'Web store | Dashboard Product Create'
        ]);
    }
}
