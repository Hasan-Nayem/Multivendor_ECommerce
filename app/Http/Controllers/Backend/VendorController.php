<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use File;
use Image;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = User::orderBy('name', 'asc')->where('role', 2)->get();      
        return view('backend.pages.vendor.manage', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vendor = new User();

        if ( $request->password == $request->password_confirmation ){
            $vendor->password       = Hash::make($request->password);
            $vendor->name           = $request->name;
            $vendor->email          = $request->email;            
            $vendor->phone          = $request->phone;
            $vendor->address1       = $request->address;
            $vendor->division       = $request->division;
            $vendor->district       = $request->district;
            $vendor->zipcode        = $request->zcode;
            $vendor->status         = $request->status;
            $vendor->role           = $request->role;
            $vendor->nid            = $request->nid;
            $vendor->eTin           = $request->etin;
            $vendor->tradeLicence   = $request->trade_licence;
            $vendor->store_name     = $request->store_name;
            $vendor->store_address  = $request->store_address;
            $vendor->store_slug     = Str::slug($request->name);

            if ( $request->image )
            {
                $image = $request->file('image');
                $img = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('backend/assets/images/vendor/' . $img);
                Image::make($image)->save($location);
                $vendor->image = $img;
            }

            $vendor->save();

            return redirect()->route('vendor.manage');
        }
        else{
            // Password Not Match Error
        }

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
        $vendor = User::find($id);

        if ( !is_null($vendor) ){
            return view('backend.pages.vendor.edit', compact('vendor'));
        }
        else{

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
