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

class ListRegisterdBusinessController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       	 
       	 $list_reg_business =  RegisteredBusiness::
        leftJoin('country', 'registered_business.country', '=', 'country.country_id')
        ->leftJoin('state', 'registered_business.state', '=', 'state.state_id')
        ->leftJoin('city', 'registered_business.city', '=', 'city.city_id')
        ->leftJoin('business_categories', 'registered_business.business_category', '=', 'business_categories.category_id')
        ->select('registered_business.*','country.country_name', 'state.state_name','city.city_name','business_categories.category_name')
        ->get();

        $count_status =  RegisteredBusiness::where('status', '1')->count();
         return view('list_registerd_business', compact('list_reg_business','count_status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	 return view('list_registerd_business');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    	//
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
