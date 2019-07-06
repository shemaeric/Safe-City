<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\help_seekers;
use App\emergency_table;
use DB;
use Response;
class emergenciesController extends Controller
{
    //
    public function showUrgents()
    {
        return view('urgent');
    }

    public function showAccidents()
    {
        return view('accidents');
    }

    public function showFire()
    {
        return view('fire');
    }

    public function showAbuse()
    {
        return view('abuse');
    }

    public function shortestCenter(Request $request)
    {
        $helpSeeker = help_seekers::where('api_token', '=', $request->api_token)->get();
        if(count($helpSeeker) > 0){
            $details = $this->get_offers_near($request->latitude,$request->longitude);
            $saving = new emergency_table();
            if($request->emergency_category === 'e'){
                $saving->help_center_id = $details[0]->id;
                $saving->help_seeker_id =  $helpSeeker[0]->id;
                $saving->emergency_category = 'e';
                $saving->longitude = $request->longitude;
                $saving->latitude = $request->latitude;
                $saved = $saving->save();
                if($saved){
                    return Response::json(['status'=>200,'message'=>'Request was successfully sent to '.$details[0]->name]);
                }
                else{
                    return Response::json(['status'=>500,'error'=>'Server error']);
                }
            }
            else{
                $saving->help_center_id = $details[0]->id;
                $saving->help_seeker_id =  $helpSeeker[0]->id;
                $saving->emergency_title = $request->title;
                $saving->emergency_category = $request->emergency_category;
                $saving->attached_file = $request->attached_file;
                $saving->description_of_attached_file = $request->description_of_attached_file;
                $saving->longitude = $request->longitude;
                $saving->latitude = $request->latitude;
                $saved = $saving->save();
                if($saved){
                    return Response::json(['status'=>200,'message'=>'Request was successfully sent to'.$details[0]->name]);
                }
                else{
                    return Response::json(['status'=>500,'error'=>'Server error']);
                }
            }
        }
        else{
            return Response::json(['status'=>500,'error'=>'Server error']);
        }
//
//        return $details[0]->id;
    }
    public function get_offers_near($latitude, $longitude)
    {

        $near = User::select(
            DB::raw("users.*,
                          ( 6371 * acos( cos( radians($latitude) ) *
                            cos( radians( latitude ) )
                            * cos( radians( longitude ) - radians($longitude)
                            ) + sin( radians($latitude) ) *
                            sin( radians( latitude ) ) )
                          ) AS distance"))
            ->orderBy('distance', 'asc')
            ->take(1)
            ->get();

        return $near;
    }
}
