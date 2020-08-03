<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.managecat', compact('categories'));
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
        // validate the form input
        $request->validate([
            'cat_name' => 'required|string|max:150',
            'cat_desc' => 'required|string',
        ], [
            'cat_name.required' => 'Opp! Category name is required',
            'cat_name.max' => 'Opp! Category name is too long',
            'cat_desc.required' => 'Opp! Description is required',

            'status.required' => 'Opps! Category Status is required',
        ]);

        $category = new Category;
        
        // assign input values to the object
        $category->name = $request->cat_name;
        $category->description = $request->cat_desc;

        // inserting the object into the DB
        $category->save();
        
        return redirect('/manage-category');
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
        $category = Category::findOrFail($id);
        return view('admin.editcat', compact('category'));
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
        // validate the form input
        $request->validate([
            'cat_name' => 'required|string|max:150',
            'cat_desc' => 'required|string',
        ], [
            'cat_name.required' => 'Opp! Category name is required',
            'cat_name.max' => 'Opp! Category name is too long',
            'cat_desc.required' => 'Opp! Description is required',

            'status.required' => 'Opps! Category Status is required',
        ]);

        //$category = new Category;

        //finding the category with the mentioned id
        $category = Category::find($id);
        
        // assign input values to the object
        $category->name = $request->cat_name;
        $category->description = $request->cat_desc;

        // inserting the object into the DB
        $category->save();
        return redirect('/manage-category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        
        return redirect()->route('managecat');
    }
}
