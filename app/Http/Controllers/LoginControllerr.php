<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
class LoginControllerr extends Controller
{
    //
    //
    public function show(){
        return view('HelpCenters.login');
    }
    public function store(Request $request){
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password,'is_active' =>1]) == false) {
            return redirect()->back()->with('warning','The email or password is incorrect, please try again');
        }

        return redirect('/home');

    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
