<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessCategory;
use App\Advertisement;
use App\Country;
use App\State;
use App\City;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $business_category = BusinessCategory::all()->toArray();

         $advertisement = Advertisement::all()->toArray();
        
         return view('home', compact('business_category', 'advertisement'));
    }
}
