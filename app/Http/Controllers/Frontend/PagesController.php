<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use App\Models\Division;
use App\Models\District;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Settings;
use Auth;
use File;
use Image;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function homePage()
    {

        $logo = Settings::where('status',1)->where('type',2)->first();
        $favicon = Settings::where('status',1)->where('type',1)->first();
        $footer = Settings::where('status',1)->where('type',3)->first();
        $products = Product::orderBy('id', 'desc')->where('status', 1)->get();
        return view('frontend.pages.homepage', compact('products','logo','favicon','footer'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutPage()
    {
        return view('frontend.pages.static-pages.about');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('frontend.pages.static-pages.contact');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pageNotFound()
    {
        return view('frontend.pages.page-404');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allProducts()
    {
        return view('frontend.pages.product.products');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pDetails($slug)
    {
        if ( !is_null( $slug ) ){
            $prDetails = Product::where('slug', $slug)->first();

            return view('frontend.pages.product.productDetails', compact('prDetails'));
        }
        else{
            // 404 Page
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkOut()
    {
        $divisions = Division::orderBy('priority_no', 'asc')->get();
        $districts = District::orderBy('name', 'asc')->get();
        return view('frontend.pages.checkout', compact('divisions', 'districts'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
