<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //

    function index(){
        $user = Auth::user();
        return view('admin.dashboard' ,['user' => $user]);
    }

    function logout(){
        Auth::logout();

        return redirect()->route('admin.login');
    }
}
