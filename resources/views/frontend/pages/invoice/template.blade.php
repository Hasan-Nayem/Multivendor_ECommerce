@extends('frontend.layout.template')

@section('body-content')

    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Order
                    <span></span> Success
                    <span></span> Invoice
                </div>
            </div>
        </div>

        <div class="invoice invoice-content invoice-3">
            
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="invoice-inner">
                            <div class="invoice-info" id="invoice_wrapper">
                                <div class="invoice-header">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="invoice-name">
                                                <div class="logo">
                                                    <a href="index.html"><img src="{{ asset('frontend/assets/imgs/theme/logo-light.svg') }}" alt="logo" /></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6  text-end">
                                            <div class="invoice-numb">
                                                <h4 class="invoice-header-1 mb-10 mt-20">Invoice No: <span class="text-heading">#{{ $payment_details->id }}</span></h4>
                                                <h6>Invoice Date: <span class="text-heading">{{ $payment_details->created_at }}</span></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="invoice-top">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="invoice-number">
                                                <h4 class="invoice-title-1 mb-10">Invoice To</h4>
                                                <p class="invoice-addr-1">
                                                    <strong>{{ $payment_details->name }}</strong> <br />
                                                    {{ $payment_details->address1 }}, {{ $payment_details->address2 }}<br>
                                                    <abbr title="Phone">Phone:</abbr> {{ $payment_details->phone }}<br>
                                                    <abbr title="Email">Email: </abbr><a href="/cdn-cgi/l/email-protection" class="__cf_email__">{{ $payment_details->email }}</a><br>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="invoice-number">
                                                <h4 class="invoice-title-1 mb-10">Bill To</h4>
                                                <p class="invoice-addr-1">
                                                    <strong>{{ $payment_details->name }}</strong> <br />
                                                    {{ $payment_details->address1 }}, {{ $payment_details->address2 }}<br>
                                                    <abbr title="Phone">Phone:</abbr> {{ $payment_details->phone }}<br>
                                                    <abbr title="Email">Email: </abbr><a href="/cdn-cgi/l/email-protection" class="__cf_email__">{{ $payment_details->email }}</a><br>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="invoice-number">
                                                <h4 class="invoice-title-1 mb-10">Overview</h4>
                                                <p class="invoice-addr-1">
                                                    <strong>Invoice Data:</strong> {{ $payment_details->created_at }} <br />
                                                    
                                                    <strong>Payment Method:</strong> 
                                                    @if ( $payment_details->payment_option == 1 )
                                                        Cash On Delivery
                                                    @elseif( $payment_details->payment_option == 2 )
                                                        OnlinePayment
                                                    @endif
                                                    <br />
                                                    <strong>Status:</strong> <span class="text-brand">
                                                        @if ( $payment_details->status == 1 )
                                                            Prrocessing
                                                        @elseif ( $payment_details->status == 2 )
                                                            On Hold
                                                        @elseif ( $payment_details->status == 3 )
                                                            Success
                                                        @elseif ( $payment_details->status == 4 )
                                                            Canceled
                                                        @elseif ( $payment_details->status == 5 )
                                                            Returned
                                                        @endif
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="invoice-center">
                                    <div class="table-responsive">
                                        <table class="table table-striped invoice-table">
                                            <thead class="bg-active">
                                                <tr>
                                                    <th>Item Item</th>
                                                    <th class="text-center">Unit Price</th>
                                                    <th class="text-center">Quantity</th>
                                                    <th class="text-right">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="item-desc-1">
                                                            <span>Field Roast Chao Cheese Creamy Original</span>
                                                            <small>SKU: FWM15VKT</small>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">$10.99</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-right">$10.99</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="item-desc-1">
                                                            <span>Blue Diamond Almonds Lightly Salted</span>
                                                            <small>SKU: FWM15VKT</small>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">$20.00</td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-right">$60.00</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="item-desc-1">
                                                            <span>Fresh Organic Mustard Leaves Bell Pepper</span>
                                                            <small>SKU: KVM15VK</small>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">$640.00</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-right">$640.00</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="item-desc-1">
                                                            <span>All Natural Italian-Style Chicken Meatballs</span>
                                                            <small>SKU: 98HFG</small>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">$240.00</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-right">$240.00</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" class="text-end f-w-600">SubTotal</td>
                                                    <td class="text-right">{{ $payment_details->amount }} BDT</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" class="text-end f-w-600">Tax</td>
                                                    <td class="text-right">$0</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" class="text-end f-w-600">Grand Total</td>
                                                    <td class="text-right f-w-600">$1795.99</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="invoice-bottom">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div>
                                                <h3 class="invoice-title-1">Important Note</h3>
                                                <ul class="important-notes-list-1">
                                                    <li>All amounts shown on this invoice are in US dollars</li>
                                                    <li>finance charge of 1.5% will be made on unpaid balances after 30 days.</li>
                                                    <li>Once order done, money can't refund</li>
                                                    <li>Delivery might delay due to some external dependency</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-offsite">
                                            <div class="text-end">
                                                <p class="mb-0 text-13">Thank you for your business</p>
                                                <p><strong>AliThemes JSC</strong></p>
                                                <div class="mobile-social-icon mt-50 print-hide">
                                                    <h6>Follow Us</h6>
                                                    <a href="#"><img src="assets/imgs/theme/icons/icon-facebook-white.svg" alt="" /></a>
                                                    <a href="#"><img src="assets/imgs/theme/icons/icon-twitter-white.svg" alt="" /></a>
                                                    <a href="#"><img src="assets/imgs/theme/icons/icon-instagram-white.svg" alt="" /></a>
                                                    <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest-white.svg" alt="" /></a>
                                                    <a href="#"><img src="assets/imgs/theme/icons/icon-youtube-white.svg" alt="" /></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-btn-section clearfix d-print-none">
                                <a href="javascript:window.print()" class="btn btn-lg btn-custom btn-print hover-up"> <img src="assets/imgs/theme/icons/icon-print.svg" alt="" /> Print </a>
                                <a id="invoice_download_btn" class="btn btn-lg btn-custom btn-download hover-up"> <img src="assets/imgs/theme/icons/icon-download.svg" alt="" /> Download </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection