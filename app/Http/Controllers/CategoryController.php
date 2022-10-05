<?php

namespace App\Http\Controllers;

use App\category;
use Dotenv\Regex\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::all();
        return view('admin.category.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category_name'=>'required'
        ]);

        $Category=new category();
        $Category->name = $request->input('category_name');
        $Category->description = $request->input('description');
        $Category->slug = Str::slug($request->category_name,'-');
        $Category->save();
        return redirect('/admin/category')->with('success','Category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        return view('admin.category.show', compact('category'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        return view('admin.category.update',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $this->validate($request,[
            'category_name'=>'required'
        ]);

        $category->name = $request->input('category_name');
        $category->description = $request->input('description');
        $category->slug = Str::slug($request->category_name,'-');
        $category->save();
        return redirect('/admin/category')->with('success','Category Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
       
        $category->delete();
        return redirect('/admin/category');
    }
}
