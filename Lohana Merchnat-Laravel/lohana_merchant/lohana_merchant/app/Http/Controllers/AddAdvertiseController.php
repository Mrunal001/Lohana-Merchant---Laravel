<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Advertisement;
use App\Country;
use App\State;
use App\City;
use App\User;

class AddAdvertiseController extends Controller
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
        $country       = Country::pluck('country_name','country_id');
        $state         = State::pluck('state_name','state_id');
        $city          = City::pluck('city_name','city_id');
        
        return view('add_advertise', compact('country','state','city'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_advertise');
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
        'business_card'         => 'mimes:jpeg,jpg,png|required|max:10000', // max 10000kb
        'business_name'         => 'required',
        'address'               => 'required',
        'person_name'           => 'required',
        'city'                  => 'required',
        'state'                 => 'required',
        'country'               => 'required',
        'mobileno'              => 'required'
        ]);

        $input  = $request->all();

         if($request->hasFile('business_card')) {
           $path = 'uploads/AD'.$request->business_card;
           $input['business_card'] = 'card_'.uniqid().".".$request->business_card->getClientOriginalExtension();
           $request->business_card->move('uploads/AD/',$input['business_card']);
        }

        
        $advertisement = new Advertisement($input);

        $user_id = Auth::id();

        $advertisement['user_id'] = $user_id;

        $advertisement->save();

        return back()->with('success', 'Your Advertise is Pending for Approval');
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
