<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RegisteredBusiness;
use App\Country;
use App\State;
use App\City;

class RegisteredBusinessController extends Controller
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
        $registerd_business = RegisteredBusiness:: 
        leftJoin('country', 'registered_business.country', '=', 'country.country_id')
        ->leftJoin('state', 'registered_business.state', '=', 'state.state_id')
        ->leftJoin('city', 'registered_business.city', '=', 'city.city_id')
        ->leftJoin('business_categories', 'registered_business.business_category', '=', 'business_categories.category_id')
        ->leftJoin('users', 'registered_business.user_id', '=', 'users.id')
        ->select('registered_business.*','country.country_name', 'state.state_name','city.city_name','business_categories.category_name','users.fullname')
        ->get();
        
        return view('admin.registered_business', compact('registerd_business'));
    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        RegisteredBusiness::where('business_id',$request->business_id)->update([
              'status' => $request->status
            ]);
  
        return response()->json(['success'=>'Status change successfully.']);
    }
}
