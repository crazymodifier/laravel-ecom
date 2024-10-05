<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    function index() {
        return view('login');
    }


    function authenticate(Request $request){

        $validator = Validator::make($request->all() , [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validator->passes()){

            $attempt = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            if( $attempt ){
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('login')
                ->withErrors($validator)
                ->withInput($request->only('email'));
            }
        } else {
            return redirect()->route('login')
                ->withErrors($validator)
                ->withInput($request->only('email'));
        }

    }
}
