<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use Session;
use Nexmo;
class RegisterUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::where('role','=','admin');
        return view('HelpCenters.register')->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $code = rand(1111,9999);
        $nexmo = app('Nexmo\Client');
        $nexmo->message()->send([
            'to' => '+250'.(int) $request->phone_number,
            'from' => 'Emergency App',
            'text' =>  'Verify Code: '.$code,
        ]);
        $adminExists = User::all();
        $user = new User();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required | email | max:255 | unique:users',
            'password'     => 'required | confirmed',
            'phone_number' => 'required | numeric |unique:users',
            'address_address' => 'required',
            'address_longitude' => 'required',
            'address_latitude' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()
                ->withErrors($validator->errors())
                ->withInput();
        }
        else{
           $code = rand(111,9999);
//            $nexmo = app('Nexmo\Client');
//            $nexmo->message()->send([
//                'to' => '+250'.(int) $request->phone_number,
//                'from' => 'Safe City',
//                'text' =>  'Verify Code: '.$code,
//            ]);
//            dd($request->all());
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->password = Hash::make($request->password);
            $user->address= $request->address_address;
            $user->longitude = $request->address_longitude;
            $user->latitude = $request->address_latitude;
            $user->code = $code;

            if(count($adminExists) < 1){
                $user->is_admin = 'admin';
                $user->active = 1;
            }
            if(count($adminExists) >= 1){
                $user->is_admin = 'member';
            }
            $saved = $user->save();
            Session::put('id',$user->id);
            if($saved){
                return redirect('verify');
            }
            else{
                return redirect()->back()->with(['warning' => 'Something went wrong']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
