<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ip_address',
        'product_id',
        'product_quantity',
        'order_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

    // Total of Products
    public static function totalCarts(){
       if( Auth::check() ){
           $carts = Cart::where('user_id', Auth::user()->id)->where('order_id', NULL)->get();
       }
       else{
        $carts = Cart::where('ip_address', request()->ip())->where('order_id', NULL)->get();
       }
       return $carts;
    }

    // Number of Items
    public static function totalItems(){
        if( Auth::check() ){
            $carts = Cart::where('user_id', Auth::user()->id)->where('order_id', NULL)->get();
        }
        else{
            $carts = Cart::where('ip_address', request()->ip())->where('order_id', NULL)->get();
        }

        $totalItems = 0;
        foreach( $carts as $cart){
            $totalItems += $cart->product_quantity;
        }
        return $totalItems;
     }
}
