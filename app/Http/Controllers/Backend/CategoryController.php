<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use File;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('name', 'asc')->where('is_parent', 0)->get();
        return view('backend.pages.category.manage', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategories = Category::orderBy('name', 'asc')->where('is_parent', 0)->get();
        return view('backend.pages.category.create', compact('parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;
        $category->name         = $request->name;
        $category->slug         = Str::slug($request->name);
        $category->description  = $request->description;
        $category->is_parent    = $request->is_parent;
        $category->status       = $request->status;

        if ( $request->image )
        {
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/assets/images/categories/' . $img);
            Image::make($image)->save($location);
            $category->image = $img;
        }
         $category->save();

         return redirect()->route('category.manage');
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
        $category = category::find($id);

        if ( !is_null( $category ) ){
            $parentCategories = Category::orderBy('name', 'asc')->where('is_parent', 0)->get();
            return view('backend.pages.category.edit', compact('category', 'parentCategories'));
        }
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
        $category = Category::find($id);
        if ( !is_null($category) ){
            $category->name         = $request->name;
            $category->slug         = Str::slug($request->name);
            $category->description  = $request->description;
            $category->is_parent    = $request->is_parent;
            $category->status       = $request->status;

            if ( $request->image )
            {

                // Delete Existing Image
                if ( File::exists('backend/assets/images/categories/' . $category->image ) ){
                    File::delete('backend/assets/images/categories/' . $category->image);
                }

                $image = $request->file('image');
                $img = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('backend/assets/images/categories/' . $img);
                Image::make($image)->save($location);
                $category->image = $img;
            }
            $category->save();

            return redirect()->route('category.manage');
        }
        
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
