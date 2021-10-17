<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;
use App\State;
use DB;

class CityController extends Controller
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
        $state = State::pluck('state_name','state_id');
        $city =  City::leftJoin('state', 'city.state_id', '=', 'state.state_id')
        ->get(['city.*','state.state_name']);

        return view('admin.add_city', compact('city','state'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.add_city');
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
        'state_id' => 'required',
        'city_name' => 'required'
        ]);

        $city = new City([
          'city_name' => $request->get('city_name'),
          'state_id' => $request->get('state_id')
        ]);

        $city->save();
        return redirect('/admin/city');
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
        $city_object = City::where('city_id',$id)->first();
         $state = State::pluck('state_name','state_id');
        return view('admin.add_city', compact('city_object','id','state'));
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
        'state_id' => 'required',
        'city_name' => 'required'
        ]);

        $state_id = $request->input('state_id');
        $city_name = $request->input('city_name');

        City::where('city_id', $id)->update(['state_id' => $state_id, 'city_name' => $city_name
        ]);
        return redirect('/admin/city');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        City::where('city_id', $id)->delete([
            'city_id' => $id
        ]);

      return redirect('/admin/city');
    }
}
