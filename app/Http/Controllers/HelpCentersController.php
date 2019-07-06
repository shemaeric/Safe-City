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
        $notActive = User::where('is_admin','!=','admin')->where('active','=','0')->get();
        $active = User::where('is_admin','!=','admin')->where('active','=','1')->get();
        $isBlocked = User::where('is_admin','!=','admin')->where('active','=','1')->get();
        return view('HelpCenters.manageUsers')->with('notActive',$notActive)->with('active',$active)->with('isBlocked',$isBlocked);
    }
    public function activate($id){
        $user = User::find($id);
        $user->active = 1;
        $user->save();
        return redirect()->back()->with(['message'=>'User has been activated']);
    }
    public function blocked($id){
        $user = User::find($id);
        if($user->is_blocked == 1) {
            $user->is_blocked = 0;
        }
        else{
            $user->is_blocked = 1;
        }
        $user->save();

        return redirect()->back();
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
