<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Brand;
use File;
use Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('name', 'asc')->get();
        return view('backend.pages.brand.manage', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = new Brand;
        $brand->name            = $request->name;
        $brand->slug            = Str::slug($request->name); 
        $brand->description     = $request->description;
        $brand->status          = $request->status;

        if ( $request->image )
        {
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/assets/images/brands/' . $img);
            Image::make($image)->save($location);
            $brand->image = $img;
        }
        $brand->save();

        $notification = array(
            'alert-type'    => 'success',
            'message'       => 'A New Brand Created Successfully'
        );

        return redirect()->route('brand.manage')->with($notification);
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

        $brand = Brand::find($id);
        // dd($brand);exit();
        if ( !is_null( $brand ) ){
            return view('backend.pages.brand.edit', compact('brand'));
        }
        else{
            // 404 Page Showing
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
        $brand = Brand::find($id);
        
        if ( !is_null( $brand ) ){
            $brand->name            = $request->name;
            $brand->slug            = Str::slug($request->name); 
            $brand->description     = $request->description;
            $brand->status          = $request->status;

            if ( $request->image )
            {
                // Delete Existing Image
                if ( File::exists('backend/assets/images/brands/' . $brand->image ) ){
                    File::delete('backend/assets/images/brands/' . $brand->image);
                }
                // Upload New Image
                $image = $request->file('image');
                $img = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('backend/assets/images/brands/' . $img);
                Image::make($image)->save($location);
                $brand->image = $img;
            }

            $brand->save();

            $notification = array(
                'alert-type'    => 'info',
                'message'       => 'The Brand Information Updated'
            );

            return redirect()->route('brand.manage')->with($notification);
        }
        else{

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $brand = Brand::find($id);

        if ( !is_null( $brand ) ){
            $brand->status = $request->status;

            $brand->save();

            $notification = array(
                'alert-type'    => 'error',
                'message'       => 'The Brand is now on Soft Delete Mode'
            );

            return redirect()->route('brand.manage')->with($notification);
        }
        else{

        }
    }
}