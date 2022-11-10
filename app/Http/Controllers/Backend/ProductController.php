<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use File;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('backend.pages.product.manage', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::orderBy('name', 'asc')->where('status', 1)->get();
        $pcategories = Category::orderBy('name', 'asc')->where('is_parent', 0)->get();
        $vendors = User::orderBy('name', 'asc')->where('status', 1)->where('role', 2)->get();
        return view('backend.pages.product.create', compact('brands', 'pcategories', 'vendors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();

        $product->title             = $request->title;
        $product->slug              = Str::slug($request->title);
        $product->short_description = $request->shrt_desc;
        $product->long_description  = $request->long_desc;
        $product->brand_id          = $request->brand_id;
        $product->category_id       = $request->category_id;
        $product->regular_price     = $request->regular_price;
        $product->offer_price       = $request->offer_price;
        $product->total_quantity    = $request->quantity;
        $product->meta_tags         = $request->meta_tags;
        $product->vendor_id         = $request->vendor_id;
        $product->featured_product  = $request->featured_product;
        $product->status            = $request->status;
        $product->sku_code          = $request->sku_code;
        $product->manufecture_date  = $request->manu_date;
        $product->expire_date       = $request->exp_date;
        $product->save();

        if ( count( $request->pimage ) > 0 ){
            foreach( $request->pimage as $image ){

                $img = rand(1, 99999999) . '.' . $image->getClientOriginalExtension();
                $location = public_path('backend/assets/images/products/' . $img);
                Image::make($image)->save($location);

                $image                  = new ProductImage();
                $image->product_id      = $product->id;
                $image->image           = $img;
                $image->save();
            }  
        }

        

        $notification = array(
            'alert-type'    => 'success',
            'message'       => 'A New Brand Created Successfully'
        );

        return redirect()->route('product.manage')->with($notification);
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
        $product = Product::find($id);

        if ( !is_null( $product ) ){
            $brands = Brand::orderBy('name', 'asc')->where('status', 1)->get();
            $pcategories = Category::orderBy('name', 'asc')->where('is_parent', 0)->get();
            $vendors = User::orderBy('name', 'asc')->where('status', 1)->where('role', 2)->get();
            return view('backend.pages.product.edit', compact('brands', 'pcategories', 'vendors', 'product'));
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
        $product = Product::find($id);

        if ( !is_null( $product ) ){
            $product->title             = $request->title;
            $product->slug              = Str::slug($request->title);
            $product->short_description = $request->shrt_desc;
            $product->long_description  = $request->long_desc;
            $product->brand_id          = $request->brand_id;
            $product->category_id       = $request->category_id;
            $product->regular_price     = $request->regular_price;
            $product->offer_price       = $request->offer_price;
            $product->total_quantity    = $request->quantity;
            $product->meta_tags         = $request->meta_tags;
            $product->vendor_id         = $request->vendor_id;
            $product->featured_product  = $request->featured_product;
            $product->status            = $request->status;
            $product->sku_code          = $request->sku_code;
            $product->manufecture_date  = $request->manu_date;
            $product->expire_date       = $request->exp_date;

            $product->save();

            $notification = array(
                'alert-type'    => 'info',
                'message'       => 'Product Information Updated Successfully'
            );

            return redirect()->route('product.manage')->with($notification);
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
