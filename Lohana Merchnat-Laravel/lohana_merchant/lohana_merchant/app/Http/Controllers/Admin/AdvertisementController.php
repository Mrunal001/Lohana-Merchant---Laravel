<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Advertisement;
use App\Country;
use App\State;
use App\City;


class AdvertisementController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisement = Advertisement:: 
        leftJoin('country', 'advertisement.country', '=', 'country.country_id')
        ->leftJoin('state', 'advertisement.state', '=', 'state.state_id')
        ->leftJoin('city', 'advertisement.city', '=', 'city.city_id')
        ->leftJoin('users', 'advertisement.user_id', '=', 'users.id')
        ->select('advertisement.*','country.country_name', 'state.state_name','city.city_name','users.fullname')
        ->get();
        
        return view('admin.advertisement', compact('advertisement'));
    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        Advertisement::where('advertise_id',$request->advertise_id)->update([
              'status' => $request->status
            ]);
  
        return response()->json(['success'=>'Status change successfully.']);
    }

}
