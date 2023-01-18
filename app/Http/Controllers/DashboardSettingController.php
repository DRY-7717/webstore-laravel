<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class DashboardSettingController extends Controller
{
    //

    public function storesetting()
    {
        return view('pages.dashboard-store-setting',[
            'title' => 'Web Store | Store Setting',
            'categories' => Category::all(),
            'user' => auth()->user() 
        ]);
    }
    public function accountsetting()
    {
        return view('pages.dashboard-account-setting',[
            'title' => 'Web Store | Account Setting',
            'user' => auth()->user()
        ]);
    }

    public function accountupdate(Request $request, $redirect)
    {
        $data = $request->all();
        $item = auth()->user();

        $item->update($data);

        return redirect()->route($redirect);
    }
}
