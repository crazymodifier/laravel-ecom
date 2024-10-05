<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageData = $this->prepareViewData([
            'pageName' => 'Dashboard New',
            'pageAction' => [
                'title' => 'Export Data',
                'url' => 'adsf'
            ]
        ]);
        return view('admin.dashboard' ,$pageData);
    }

    function profile(){
        $pageData = $this->prepareViewData([
            'pageName' => 'Users'
        ]);
        return view('admin.dashboard' ,$pageData);
    }

    function logout(){
        Auth::logout();

        return redirect()->route('login');
    }
}
