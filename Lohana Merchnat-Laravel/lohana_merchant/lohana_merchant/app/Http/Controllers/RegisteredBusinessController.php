<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RegisteredBusiness;
use App\Country;
use App\State;
use App\City;
use App\BusinessCategory;
use App\User;

class RegisteredBusinessController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       	 $country   	= Country::pluck('country_name','country_id');
         $state     	= State::pluck('state_name','state_id');
         $city      	= City::pluck('city_name','city_id');
         $business_category = BusinessCategory::pluck('category_name','category_id');
         return view('registered_business', compact('country','state','city','business_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	 return view('registered_business');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    	$this->validate($request, [
        'business_card' 		=> 'mimes:jpeg,jpg,png|required|max:10000', // max 10000kb
        'business_title' 		=> 'required',
        'contact_person' 		=> 'required',
        'address' 				=> 'required',
        'city' 					=> 'required',
        'state' 				=> 'required',
        'country' 				=> 'required',
        'business_category' 	=> 'required',
        'business_type' 		=> 'required',
        'mode_of_payment' 		=> 'required',
        'year_of_establishment' => 'required',
        'specialist_in' 		=> 'required',
        'about_business' 		=> 'required',
        'website' 				=> 'required',
        'email' 				=> 'required',
        'mobileno' 				=> 'required'
    	]);

        $input  = $request->all();

         if($request->hasFile('business_card')) {
           $path = 'uploads/business_card'.$request->business_card;
           $input['business_card'] = 'card_'.uniqid().".".$request->business_card->getClientOriginalExtension();
           $request->business_card->move('uploads/business_card/',$input['business_card']);
        }
        
        $registered_business = new RegisteredBusiness($input);

		$registered_business->mode_of_payment = implode(',',$request->mode_of_payment);

		$user_id = Auth::id();

        $registered_business['user_id'] = $user_id;

        $registered_business->save();

        return back()->with('success', 'Pending for Approval');
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
