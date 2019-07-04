<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\help_centers;
class HelpCentersController extends Controller
{
    //
    public function index(){
        return view('HelpCenters.register');
    }
    public function show(){
        $user = User::where('is_admin','!=','admin')->where('active','=',0)->get();
        return view('HelpCenters.manageUsers')->with('user',$user);
    }
    public function activate($id){
        $user = User::find($id);
        $user->active = 1;
        $user->save();
        return redirect()->back()->with(['message'=>'User has been activated']);
    }
    public function store(Request $request){
        $validate = \Validator::make($request->all(), [
            'name' => 'required',
            'email'  => 'required|unique:help_centers,email',
            'phone_number' => 'required|unique:help_centers,phone_number',
            'password'     => 'required',
        ]);
        if($validate->fails()) {
            return redirect()->back()
                ->withErrors($validate->errors())
                ->withInput();
        }
        return view('');
    }
}
