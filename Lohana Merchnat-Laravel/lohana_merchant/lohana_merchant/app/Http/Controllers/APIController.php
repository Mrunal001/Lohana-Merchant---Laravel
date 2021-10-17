<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\City;
use App\State;
use App\Country;
use DB;

class APIController extends Controller
{
    
    public function getStateList(Request $request)
    {
        $state = State::where("country_id",$request->id)
                    ->pluck("state_name","state_id");      
        return response()->json($state);
    }
    public function getCityList(Request $request)
    {
        $city = City::where("state_id",$request->id)
                    ->pluck("city_name","city_id");
        return response()->json($city);
    }
}
