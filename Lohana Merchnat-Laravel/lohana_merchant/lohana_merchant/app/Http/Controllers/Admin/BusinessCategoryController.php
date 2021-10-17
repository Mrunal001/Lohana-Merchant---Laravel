<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BusinessCategory;

class BusinessCategoryController extends Controller
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

       $category = BusinessCategory::all()->toArray();
        
        return view('admin.add_business_category', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_business_category');
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
        'category_name' => 'required'
        ]);
    
        $input  = $request->all();
        $category    = new BusinessCategory($input);

        $category->save();
        return back()->with('success', 'Successfully Add Category');
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
        $business_object = BusinessCategory::where('category_id',$id)->first();

        return view('admin.add_business_category', compact('business_object','id'));
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
        'category_name' => 'required'
        ]);
        
        $category_name = $request->input('category_name');

        BusinessCategory::where('category_id', $id)->update([
            'category_name' => $category_name
        ]);
        return redirect('/admin/business_category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BusinessCategory::where('category_id', $id)->delete([
            'category_id' => $id
        ]);

      return redirect('/admin/business_category');
    }
}
