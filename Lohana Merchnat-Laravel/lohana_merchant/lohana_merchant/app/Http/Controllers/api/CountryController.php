<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Country;
use App\State;
use App\City;
use Yajra\Datatables\Datatables;

class CountryController extends Controller
{

    /*public function __construct()
    {
        $this->middleware('auth:admin');
    }*/
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_country(Request $request)
    {
        $token = $request->token;
        
        if($token == 'sdgjdsufjY&FD^FHJVNHDKI-))'){

            $country = Country::all()->toArray();    
            return response()->json(['status'=>'true', 'country'=> $country]);
        } else {
            return response()->json(['status'=>'false','message'=> 'Token Mismatch']);
        }
        
        
        //return view('admin.add_country', compact('country'));

        
    }

     public function get_alldata(Request $request)
    {
        $token = $request->token;
        
        if($token == 'sdgjdsufjY&FD^FHJVNHDKI-))'){
            
            $state = State::all()->toArray();    
            $country = Country::all()->toArray();    
            $city = City::all()->toArray();    
            return response()->json(['status'=>'true', 'state'=> $state, 'country'=> $country, 'city'=> $city]);
        } else {
            return response()->json(['status'=>'false','message'=> 'Token Mismatch']);
        }
       
    }
   
}


