<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Auth;
use File;
use Image;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.pages.cart');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ( Auth::check() ){
            $cart = Cart::where('user_id', Auth::user()->id)
            ->where('product_id', $request->product_id)
            ->where('order_id', NULL)
            ->first();
        }
        else{
            $cart = Cart::where('ip_address', $request->ip())
            ->where('product_id', $request->product_id)
            ->where('order_id', NULL)
            ->first();
        }

        if ( !is_null($cart) ){
            // $cart->increment('product_quantity');
            $cart->product_quantity += $request->product_quantity;
            $cart->save();
            return redirect()->back();
        }
        else{
            $cart = new Cart();
            if ( Auth::check() ){
                $cart->user_id = Auth::user()->id;
            }
            $cart->ip_address = $request->ip();
            $cart->product_id = $request->product_id;
            $cart->product_quantity = $request->product_quantity;
            $cart->save();         
        }
            

        $notification = array(
            'alert-type'    => 'success',
            'message'       => 'A New Item Added Successfully'
        );

        return redirect()->back()->with($notification);

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
        $cart = Cart::find($id);

        if ( !is_null($cart) ){
            $cart->product_quantity = $request->product_quantity;
            $cart->save();
            return redirect()->back();
        }
        else{
            return redirect()->back();
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
        $cart = Cart::find($id);

        if ( !is_null( $cart ) ){
            $cart->delete();
            return redirect()->back();
        }
    }
}
