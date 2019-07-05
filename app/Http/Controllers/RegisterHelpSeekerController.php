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
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'my_phone_number'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $credentials = $request->only('first_name', 'my_phone_number');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(compact('token'));
    }
    public function getAuthenticatedUser()
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        return response()->json(compact('user'));
    }
}
