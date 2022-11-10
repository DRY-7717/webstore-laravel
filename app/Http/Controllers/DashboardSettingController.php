<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardSettingController extends Controller
{
    //

    public function storesetting()
    {
        return view('pages.dashboard-store-setting',[
            'title' => 'Web Store | Store Setting'
        ]);
    }
    public function accountsetting()
    {
        return view('pages.dashboard-account-setting',[
            'title' => 'Web Store | Account Setting'
        ]);
    }
}
