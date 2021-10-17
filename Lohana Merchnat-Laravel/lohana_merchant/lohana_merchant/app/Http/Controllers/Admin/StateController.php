<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Country;
use App\State;
use DB;

class StateController extends Controller
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

       //$state   = State::all()->toArray();
       $country = Country::pluck('country_name','country_id');
       
        $state =  State::
        leftJoin('country', 'state.country_id', '=', 'country.country_id')
        ->get(['state.*','country.country_name']);
        
        return view('admin.add_state', compact('state','country'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.add_state');
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
        'country_id' => 'required',
        'state_name' => 'required'
        ]);

        $state = new State([
          'state_name' => $request->get('state_name'),
          'country_id' => $request->get('country_id')
        ]);

        $state->save();
        return redirect('/admin/state');
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
        $state_object = State::where('state_id',$id)->first();
        $state =  State::
        leftJoin('country', 'state.country_id', '=', 'country.country_id')
        ->get(['state.*','country.country_name']);

        $country = Country::pluck('country_name','country_id');
        return view('admin.add_state', compact('state_object','id','country','state'));
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
        $this->validate($request, [
        'country_id' => 'required',
        'state_name' => 'required'
        ]);

        $country_id = $request->input('country_id');
        $state_name = $request->input('state_name');

        State::where('state_id', $id)->update(['country_id' => $country_id, 'state_name' => $state_name
        ]);
        return redirect('/admin/state');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        State::where('state_id', $id)->delete([
            'state_id' => $id
        ]);

      return redirect('/admin/state');
    }
}
