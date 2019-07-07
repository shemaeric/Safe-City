<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;

class VerifyController extends Controller
{
    //
    public function getVerify(){
        return view('HelpCenters.VerifyNumber');
    }
    public function postVerify(Request $request){
       $user = User::find($request->id);
        $validator = Validator::make($request->all(), [
            'verify_code' => 'required']);
        if($validator->fails()){
            return redirect()->back()
                ->withErrors($validator->errors())
                ->withInput();
        }
       if($user->code === $request->verify_code){
           $user->is_verified = 1;
           $user->save();
           $message = '';
           if($user->is_admin === 'admin'){
               $message_login = 'Verified successfully';
               return redirect()->back()->with(['message_login'=>$message_login]);
           }
           if($user->is_admin !=='admin'){
               $message_verify = 'Verified successfully. Please wait for admin to approve you';
               return redirect()->back()->with(['message_verify'=>$message_verify]);
           }
       }
       else{
           return redirect()->back()->with(['warning'=>'Something went wrong!']);
       }
    }
}
