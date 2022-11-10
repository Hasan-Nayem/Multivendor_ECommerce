@extends('frontend.layout.template')

@section('body-content')

    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Shop
                    <span></span> Checkout
                </div>
            </div>
        </div>
        <div class="container mb-80 mt-50">
            <div class="row">
                <div class="col-lg-12 mb-40 text-center">
                    <h2 class="heading-2 mb-10">Checkout</h2>
                    <div class="d-flex justify-content-between">
                        <h6 class="text-body">There are <span class="text-brand">{{ App\Models\Cart::totalItems() }}</span> products in your cart</h6>
                    </div>
                </div>
            </div>
            <div class="row">
                
                    <div class="col-lg-7">
                        <div class="row mb-50">
                            <div class="col-lg-6 mb-sm-15 mb-lg-0 mb-md-3">
                                <form method="post" class="apply-coupon">
                                    <input type="text" placeholder="Enter Coupon Code...">
                                    <button class="btn  btn-md" name="login">Apply Coupon</button>
                                </form>
                            </div>
                        </div>


                        <form action="{{ route('sslPay') }}" method="POST" class="needs-validation">
                            @csrf
                            <div class="row">
                                <h4 class="mb-30">Billing Details</h4>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="name" 
                                        @if( Auth::check()) value="{{ Auth::user()->name }}" 
                                        @else value="{{ old('name') }}" 
                                        @endif placeholder="Enter Your *" required="">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="phone" 
                                        @if( Auth::check()) value="{{ Auth::user()->phone }}" 
                                        @else value="{{ old('phone') }}" 
                                        @endif placeholder="Phone *" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="address1" 
                                        @if( Auth::check()) value="{{ Auth::user()->address1 }}" 
                                        @else value="{{ old('address1') }}" 
                                        @endif placeholder="Address *" required="">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="address2" 
                                        @if( Auth::check()) value="{{ Auth::user()->address2 }}" 
                                        @else value="{{ old('address2') }}"  
                                        @endif placeholder="Address line2">
                                    </div>
                                </div>
                                <div class="row shipping_calculator">
                                    <div class="form-group col-lg-6">
                                        <div class="custom_select">
                                            <input type="text" name="country" class="form-control" placeholder="Enter Country Name" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <div class="custom_select">
                                            <select class="form-control select-active" name="division_id">
                                                <option value="">Select Division...</option>
                                                    @foreach ( $divisions as $division)
                                                    <option value="{{ $division->id }}" 
                                                        @if ( Auth::check() )
                                                            @if ( $division->id == Auth::user()->division ) selected 
                                                            @endif
                                                        @endif
                                                        >
                                                        {{ $division->name }}
                                                    </option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <div class="custom_select">
                                            <select class="form-control select-active" name="district_id">
                                                <option value="">Select District...</option>
                                                    @foreach ( $districts as $district)
                                                    <option value="{{ $district->id }}"
                                                        @if ( Auth::check() )
                                                            @if ( $district->id == Auth::user()->district ) selected 
                                                            @endif
                                                        @endif 
                                                        >
                                                        {{ $district->name }}
                                                    </option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="zipcode" 
                                        @if( Auth::check()) value="{{ Auth::user()->zipcode }}" 
                                        @else value="{{ old('zipcode') }}" 
                                        @endif placeholder="Postcode / ZIP *" required="">
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <!-- <div class="form-group col-lg-6">
                                        <input required="" type="text" name="cname" placeholder="Company Name">
                                    </div> -->
                                    <div class="form-group col-lg-6">
                                        <input  type="email" name="email" 
                                        @if( Auth::check()) value="{{ Auth::user()->email }}" disabled
                                        @else value="{{ old('email') }}" 
                                        @endif placeholder="Email address *" required="">
                                    </div>
                                </div>
                                <div class="form-group mb-30">
                                    <textarea rows="5" placeholder="Additional information" name="addi_info"></textarea>
                                </div>
                            </div>
                    </div>

                    <div class="col-lg-5">
                            <div class="border p-40 cart-totals ml-30 mb-50">
                                <div class="d-flex align-items-end justify-content-between mb-30">
                                    <h4>Your Order</h4>
                                    <h6 class="text-muted">Subtotal</h6>
                                </div>
                                <div class="divider-2 mb-30"></div>
                                <div class="table-responsive order_table checkout">
                                    <table class="table no-border">
                                        <tbody>
                                            @php
                                                $totalAmount = 0;
                                            @endphp
                                            @foreach( App\Models\Cart::totalCarts() as $carts )
                                            <tr>
                                                <td class="image product-thumbnail">
                                                    @php $i = 1; @endphp
                                                    @foreach( $carts->product->images as $img )

                                                        @if ( $i > 0 )
                                                        <img src="{{ asset( 'backend/assets/images/products/' . $img->image )  }}" alt="#">
                                                        @endif

                                                        @php $i--; @endphp
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <h6 class="w-160 mb-5"><a href="{{ route('productDetails', $carts->product->slug) }}" class="text-heading">{{ $carts->product->title }}</a></h6></span>
                                                    <div class="product-rate-cover">
                                                        <div class="product-rate d-inline-block">
                                                            <div class="product-rating" style="width:90%">
                                                            </div>
                                                        </div>
                                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="text-muted pl-20 pr-20">x {{ $carts->product_quantity }}</h6>
                                                </td>
                                                <td>
                                                    <h6 class="text-brand">
                                                        @if( !is_null($carts->product->offer_price) )
                                                            {{ $carts->product->offer_price }} BDT
                                                            @php
                                                                $totalAmount += $carts->product->offer_price * $carts->product_quantity;
                                                            @endphp
                                                        @else
                                                            {{ $carts->product->regular_price }} BDT
                                                            @php
                                                                $totalAmount += $carts->product->regular_price * $carts->product_quantity;
                                                            @endphp
                                                        @endif
                                                    </h6>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="table-responsive">
                                    <table class="table no-border">
                                        <tbody>
                                            <tr>
                                                <td class="cart_total_label">
                                                    <h6 class="text-muted">Subtotal</h6>
                                                </td>
                                                <td class="cart_total_amount">
                                                    <h6 class="text-brand text-end">{{ $totalAmount }} BDT</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="col" colspan="2">
                                                    <div class="divider-2 mt-10 mb-10"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">
                                                    <h6 class="text-muted">Shipping</h6>
                                                </td>
                                                <td class="cart_total_amount">
                                                    <h6 class="text-heading text-end">Free</h6</td> </tr> <tr>
                                                <td class="cart_total_label">
                                                    <h6 class="text-muted">Estimate for</h6>
                                                </td>
                                                <td class="cart_total_amount">
                                                    <h6 class="text-heading text-end">United Kingdom</h6</td> </tr> <tr>
                                                <td scope="col" colspan="2">
                                                    <div class="divider-2 mt-10 mb-10"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">
                                                    <h6 class="text-muted">Total</h6>
                                                </td>
                                                <td class="cart_total_amount">
                                                    <h6 class="text-brand text-end">{{ $totalAmount }} BDT</h6>
                                                </td>
                                                <input type="hidden" name="amount" value="{{ $totalAmount }}">
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                            <div class="payment ml-30">
                                <h4 class="mb-30">Payment</h4>
                                @if ( Auth::check() )
                                <div class="payment_option">
                                    
                                    <div class="custome-radio">
                                        <input class="form-check-input" type="radio" name="payment_option" id="exampleRadios4" checked="" value="1">
                                        <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">Cash on delivery</label>
                                    </div>

                                    <div class="custome-radio">
                                        <input class="form-check-input" type="radio" name="payment_option" id="exampleRadios5" checked="" value="2">
                                        <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">Online Getway</label>
                                    </div>
                                </div>
                                <div class="payment-logo d-flex">
                                    <img class="mr-15" src="{{asset('frontend/assets/imgs/theme/icons/payment-paypal.svg')}}" alt="">
                                    <img class="mr-15" src="{{asset('frontend/assets/imgs/theme/icons/payment-visa.svg')}}" alt="">
                                    <img class="mr-15" src="{{asset('frontend/assets/imgs/theme/icons/payment-master.svg')}}" alt="">
                                    <img src="{{asset('frontend/assets/imgs/theme/icons/payment-zapper.svg')}}" alt="">
                                </div>
                                <button type="submit" class="btn btn-fill-out btn-block mt-30">Place an Order<i class="fi-rs-sign-out ml-15"></i></button>
                                @else
                                    <button class="btn btn-fill-out btn-block mt-30">Place Login to Checkout<i class="fi-rs-sign-out ml-15"></i></button>
                                @endif
                                
                            </div>
                        </form>
                    </div>
                
            </div>
        </div>
    </main>
    
@endsection