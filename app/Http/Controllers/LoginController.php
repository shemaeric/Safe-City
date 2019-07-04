<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class LoginController extends Controller
{
    //
    public function show(){
        return view('HelpCenters.login');
    }
    public function store(Request $request){
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password,'active' =>1]) == false) {
            return redirect()->back()->with('warning','The email or password is incorrect, please try again');
        }

        return redirect('/home');

    }
    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}
