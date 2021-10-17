<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Country;
use Yajra\Datatables\Datatables;

class CountryController extends Controller
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
        $country = Country::all()->toArray();
        
        return view('admin.add_country', compact('country'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_country');
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
        'country_name' => 'required'
    	]);
    
    	$input 	= $request->all();
        $country 	= new Country($input);

        $country->save();
        return back()->with('success', 'Successfully Add Country');
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
        $country_object = Country::where('country_id',$id)->first();

        return view('admin.add_country', compact('country_object','id'));
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
        'country_name' => 'required'
    	]);
    	
       	$country_name = $request->input('country_name');

        Country::where('country_id', $id)->update([
            'country_name' => $country_name
        ]);
        return redirect('/admin/country');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Country::where('country_id', $id)->delete([
            'country_id' => $id
        ]);

      return redirect('/admin/country');
    }

}


