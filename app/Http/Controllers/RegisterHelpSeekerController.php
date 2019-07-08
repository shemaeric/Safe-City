<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\help_seekers;
use Illuminate\Support\Facades\Validator;
use JWTFactory;
use JWTAuth;
use Response;
class RegisterHelpSeekerController extends Controller
{
    //
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'my_phone_number' => 'required | numeric |unique:help_seekers,my_phone_number',
                'referee_phone_number' =>'required | numeric',
            ],
            [
                'my_phone_number.unique'=>'Your phone number is already taken',
            ]
        );
        if ($validator->fails()) {
            return response()->json(["status"=>400,"errors"=>$validator->errors()]);
        }
        $code = rand(111,9999);
        //$api_token = rand(4444,9000);
        $show = help_seekers::create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('first_name'),
            'my_phone_number' => $request->get('my_phone_number'),
            'referee_phone_number' => $request->get('referee_phone_number'),
            'code' => $code,
        ]);
        $nexmo = app('Nexmo\Client');
        $nexmo->message()->send([
            'to' => '+250'.(int) $request->my_phone_number,
            'from' => 'Emergency App',
            'text' =>  'Verify Code: '.$code,
        ]);
        $user = $show::first();
        return Response::json(['status'=>201,'details'=>$user]);
    }
    public function verify(Request $request){
        $verificationExists = help_seekers::where('code', '=',$request->code)->where('id','=',$request->id)->where('my_phone_number','=',$request->my_phone_number);
        if($verificationExists){
            $api_token = bcrypt(rand(4444,9000));
            $find = help_seekers::find($request->id);
            $find->api_token = $api_token;
            $find->is_verified = 1;
            $saved = $find->save();
            if($saved){
                return Response::json(['status'=>200,'api_token'=>$api_token]);
            }
            else{
                return Response::json(['status'=>400,'errors'=>'Something went wrong']);
            }
        }
        else{
            return Response::json(['status'=>400,'errors'=>'Your verification code is incorrect']);
        }
    }

}
