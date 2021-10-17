<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RegisteredBusiness;
use App\Advertisement;
use App\BusinessCategory;
use App\Country;
use App\State;
use App\City;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reg_business       = RegisteredBusiness::all();

        $advertisement      = Advertisement::all();

        $country            = Country::all();

        $state              = State::all();

        $business_category  = BusinessCategory::all();

        $reg_user           = user::all();

        return view('admin/dashboard', compact('reg_business', 'advertisement','country', 'state', 'business_category', 'reg_user'));
    }
}
