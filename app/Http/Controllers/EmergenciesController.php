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
        $urgent = emergency_table::where('emergency_category', '=', 'ur')->get();
        return view('urgent')->with('urgent', $urgent);
    }

    public function showAccidents()
    {
        $details = emergency_table::where('emergency_category', '=', 'ac')->get();
        return view('accidents')->with('details', $details);
    }

    public function approve($id)
    {
        $approve = emergency_table::find($id);
        if ($approve->approved != 1) {
            $approve->approved = 1;
            $done = $approve->save();
            if ($done) {

                $nexmo = app('Nexmo\Client');
                $nexmo->message()->send([
                    'to' => '+250'.(int) $approve->help_seeker->my_phone_number,
                    'from' => $approve->users->name,
                    'text' =>  'Soon we are reaching there.',
                ]);
                return redirect()->back()->with(['message' => 'Approved message sent to help seeker']);

            }
        }
    }

    public function showFire()
    {
        $details = emergency_table::where('emergency_category', '=', 'fi')->get();
        return view('fire')->with('details', $details);
    }

    public function showAbuse()
    {
        $details = emergency_table::where('emergency_category', '=', 'ab')->get();
        return view('abuse')->with('details', $details);
    }

    public function shortestCenter(Request $request)
    {
        $helpSeeker = help_seekers::where('api_token', '=', $request->api_token)->get();
        if (count($helpSeeker) > 0) {
            $details = $this->get_offers_near($request->latitude, $request->longitude);
            $saving = new emergency_table();
            $saving->help_center_id = $details[0]->id;
            $saving->help_seeker_id = $helpSeeker[0]->id;
            $saving->emergency_title = $request->emergency_title;
            $saving->emergency_category = $request->emergency_category;
            $saving->attached_file = $request->attached_file;
            $saving->description_of_attached_file = $request->description_of_attached_file;
            $saving->longitude = $request->longitude;
            $saving->latitude = $request->latitude;
            $saved = $saving->save();
            if ($saved) {
                return Response::json(['status' => 200, 'message' => 'Request was successfully sent to ' . $details[0]->name]);
            } else {
                return Response::json(['status' => 500, 'error' => 'Server error']);
            }
        }
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

    public function details($id)
    {
        $details = emergency_table::find($id);
        return view('details')->with('details', $details);
    }

    public function translatepic(Request $request)
    {
        $helpSeeker = help_seekers::where('api_token', '=', $request->api_token)->get();
        if (count($helpSeeker) > 0) {
            $details = $this->get_offers_near($request->latitude, $request->longitude);
            $image = $request->attached_file;  // your base64 encoded
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = str_random(10) . '.' . 'png';
            \File::put(storage_path() . '/' . $imageName, base64_decode($image));
            $saving = new emergency_table();
            $saving->help_center_id = $details[0]->id;
            $saving->help_seeker_id = $helpSeeker[0]->id;
            $saving->emergency_title = $request->emergency_title;
            $saving->emergency_category = $request->emergency_category;
            $saving->attached_file = $imageName;
            $saving->description_of_attached_file = $request->description_of_attached_file;
            $saving->longitude = $request->longitude;
            $saving->latitude = $request->latitude;
            $saved = $saving->save();
            if ($saved) {
                return Response::json(['status' => 200, 'message' => 'Request was successfully sent to ' . $details[0]->name]);
            } else {
                return Response::json(['status' => 500, 'error' => 'Server error']);
            }
        }
    }
    public function showMe(Request $request){
        $image = $request->attached_file;  // your base64 encoded
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = rand(111,9999) . '.' . 'png';
        \File::put(storage_path(). '/app/public' . $imageName, base64_decode($image));
    }
}
