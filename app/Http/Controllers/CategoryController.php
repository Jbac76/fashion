<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')->get();
        return view('admin.managecat',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addcat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array();
        $data['name'] = $request->cat_name;
        $data['description'] = $request->cat_desc;
        $data['status'] = $request->status;

        DB::table('categories')->insert($data);
        // i will need a mesage to confirm this
        return Redirect::to('/managecat');
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
        $cats = DB::table('categories')->where('id',$id)->first();
        return view('admin.editcat', compact('cats'));
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
        $data = array();
        $data['name'] = $request->cat_name;
        $data['description'] = $request->cat_desc;
        $data['status'] = $request->status;

        DB::table('categories')->where('id',$id)->update($data);
        // i will need a mesage to confirm this
        return Redirect::to('/managecat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('categories')->delete($id);
        return Redirect::to('/managecat');
    }
}
