<?php

use Illuminate\Support\Facades\Route;

// Website Frontend
use App\Http\Controllers\Frontend\AuthenticationController;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CustomerDash;
use App\Http\Controllers\SslCommerzPaymentController;

// Backend Admin
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\DivisionController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\SettingsController;

/*
|--------------------------------------------------------------------------
| Fronend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PagesController::class, "homePage"])->name('homePage');

// Static Pages
Route::get('/about-page', [PagesController::class, "aboutPage"])->name('aboutPage');
Route::get('/contact-us', [PagesController::class, "contact"])->name('contact');
Route::get('/404-page-not-found', [PagesController::class, "pageNotFound"])->name('404');


// Product Pages
Route::get('/all-products', [PagesController::class, "allProducts"])->name('allProducts');
Route::get('/product-details/{slug}', [PagesController::class, "pDetails"])->name('productDetails');


// Authentication Pages For Frontend
Route::group(['prefix' => '/customer'], function(){
    Route::get('/login', [AuthenticationController::class, "login"])->name('cus-login');
    Route::get('/register', [AuthenticationController::class, "register"])->name('cus-register');
    Route::get('/forget-password', [AuthenticationController::class, "forgetPassword"])->name('customer-forget-password');
    Route::get('/reset-password', [AuthenticationController::class, "resetPassword"])->name('customer-reset-password');

    // Customer Dashboard
    Route::get('/my-account', [CustomerDash::class, "index"])->middleware(['auth'])->name('customerAccount');
    Route::post('/my-account/update/{id}', [CustomerDash::class, "update"])->middleware(['auth'])->name('customerUpdate');
});


// Cart and Checkout Pages
Route::group(['prefix' => '/cart'] , function(){  
    Route::get('/', [CartController::class, "index"])->name('cart.manage');
    Route::post('/store', [CartController::class, "store"])->name('cart.store');
    Route::post('/update/{id}', [CartController::class, "update"])->name('cart.update');
    Route::post('/destroy/{id}', [CartController::class, "destroy"])->name('cart.destroy');
});


Route::get('/checkout', [PagesController::class, "checkOut"])->name('checkout');




// SSLCOMMERZ Start
// Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index'])->name('sslPay');
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);


Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END




/*
|--------------------------------------------------------------------------
| Backend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin'] , function(){  
    // Super Admin Dashboard 
    Route::get('/dashboard', [DashboardController::class, "dashboard"])->middleware('auth', 'isAdmin')->name('admin.dashboard');

    // Brand Group
    Route::group(['prefix' => '/brand'], function(){
        Route::get('/manage', [BrandController::class, "index"])->middleware(['auth'])->name('brand.manage');
        Route::get('/create', [BrandController::class, "create"])->middleware(['auth'])->name('brand.create');
        Route::post('/store', [BrandController::class, "store"])->middleware(['auth'])->name('brand.store');        
        Route::get('/edit/{id}', [BrandController::class, "edit"])->middleware(['auth'])->name('brand.edit');
        Route::post('/update/{id}', [BrandController::class, "update"])->middleware(['auth'])->name('brand.update');
        Route::post('/destroy/{id}', [BrandController::class, "destroy"])->middleware(['auth'])->name('brand.destroy');
    });


    // Category Group
    Route::group(['prefix' => '/category'], function(){
        Route::get('/manage', [CategoryController::class, "index"])->middleware(['auth'])->name('category.manage');
        Route::get('/create', [CategoryController::class, "create"])->middleware(['auth'])->name('category.create');
        Route::post('/store', [CategoryController::class, "store"])->middleware(['auth'])->name('category.store');        
        Route::get('/edit/{id}', [CategoryController::class, "edit"])->middleware(['auth'])->name('category.edit');
        Route::post('/update/{id}', [CategoryController::class, "update"])->middleware(['auth'])->name('category.update');
        Route::post('/destroy/{id}', [CategoryController::class, "destroy"])->middleware(['auth'])->name('category.destroy');
    });

    // Product Group
    Route::group(['prefix' => '/product'], function(){
        Route::get('/manage', [ProductController::class, "index"])->middleware(['auth'])->name('product.manage');
        Route::get('/create', [ProductController::class, "create"])->middleware(['auth'])->name('product.create');
        Route::post('/store', [ProductController::class, "store"])->middleware(['auth'])->name('product.store');        
        Route::get('/edit/{id}', [ProductController::class, "edit"])->middleware(['auth'])->name('product.edit');
        Route::post('/update/{id}', [ProductController::class, "update"])->middleware(['auth'])->name('product.update');
        Route::post('/destroy/{id}', [ProductController::class, "destroy"])->middleware(['auth'])->name('product.destroy');
    });


    // Vendor Group
    Route::group(['prefix' => '/vendor'], function(){
        Route::get('/manage', [VendorController::class, "index"])->middleware(['auth'])->name('vendor.manage');
        Route::get('/create', [VendorController::class, "create"])->middleware(['auth'])->name('vendor.create');
        Route::post('/store', [VendorController::class, "store"])->middleware(['auth'])->name('vendor.store');        
        Route::get('/edit/{id}', [VendorController::class, "edit"])->middleware(['auth'])->name('vendor.edit');
        Route::post('/update/{id}', [VendorController::class, "update"])->middleware(['auth'])->name('vendor.update');
        Route::post('/destroy/{id}', [VendorController::class, "destroy"])->middleware(['auth'])->name('vendor.destroy');
    });


    // Division Group
    Route::group(['prefix' => '/division'], function(){
        Route::get('/manage', [DivisionController::class, "index"])->middleware(['auth'])->name('division.manage');
        Route::get('/create', [DivisionController::class, "create"])->middleware(['auth'])->name('division.create');
        Route::post('/store', [DivisionController::class, "store"])->middleware(['auth'])->name('division.store');        
        Route::get('/edit/{id}', [DivisionController::class, "edit"])->middleware(['auth'])->name('division.edit');
        Route::post('/update/{id}', [DivisionController::class, "update"])->middleware(['auth'])->name('division.update');
        Route::post('/destroy/{id}', [DivisionController::class, "destroy"])->middleware(['auth'])->name('division.destroy');
    });

    // District Group
    Route::group(['prefix' => '/district'], function(){
        Route::get('/manage', [DistrictController::class, "index"])->middleware(['auth'])->name('district.manage');
        Route::get('/create', [DistrictController::class, "create"])->middleware(['auth'])->name('district.create');
        Route::post('/store', [DistrictController::class, "store"])->middleware(['auth'])->name('district.store');        
        Route::get('/edit/{id}', [DistrictController::class, "edit"])->middleware(['auth'])->name('district.edit');
        Route::post('/update/{id}', [DistrictController::class, "update"])->middleware(['auth'])->name('district.update');
        Route::post('/destroy/{id}', [DistrictController::class, "destroy"])->middleware(['auth'])->name('district.destroy');
    });

    Route::group(['prefix' => '/settings'],function(){
        Route::get('/manage', [SettingsController::class, "index"])->middleware(['auth'])->name('settings.all');
        Route::get('/notice', [SettingsController::class, "notice"])->middleware(['auth'])->name('settings.notice.manage');
        



        Route::group(['prefix'=> 'images'], function(){
            // Route::get('/logo',[SettingsController::class,'logoIndex'])->middleware(['auth'])->name('settings.logo');

            Route::get('/manage',[SettingsController::class,'logoIndex'])->middleware(['auth'])->name('settings.logo.manage');
            Route::get('/create',[SettingsController::class,'logoCreate'])->middleware(['auth'])->name('settings.logo.create');
            Route::post('/add',[SettingsController::class,'logoAdd'])->middleware(['auth'])->name('settings.logo.add');
            Route::get('/edit/{id}',[SettingsController::class,'logoEdit'])->middleware(['auth'])->name('settings.logo.edit');
            Route::post('/update/{id}',[SettingsController::class,'logoUpdate'])->middleware(['auth'])->name('settings.logo.update');
            Route::get('/delete/{id}',[SettingsController::class,'logoDelete'])->middleware(['auth'])->name('settings.logo.delete');
            
        });





        Route::group(['prefix' => 'notice'],function(){
            Route::get('/manage',[SettingsController::class,"noticeIndex"])->middleware(['auth'])->name('settings.notice.manage');
            Route::get('/create',[SettingsController::class,"noticeCreate"])->middleware(['auth'])->name('settings.notice.create');
            Route::post('/store',[SettingsController::class,"noticeStore"])->middleware(['auth'])->name('settings.notice.store');
            Route::get('/edit/{id}',[SettingsController::class,"noticeEdit"])->middleware(['auth'])->name('settings.notice.edit');
            Route::post('/update/{id}',[SettingsController::class,"noticeUpdate"])->middleware(['auth'])->name('settings.notice.update');
            Route::get('/delete/{id}',[SettingsController::class,"noticeDelete"])->middleware(['auth'])->name('settings.notice.delete');
        });

        Route::group(['prefix' => 'slider'],function(){
            Route::get('/manage',[SettingsController::class,"sliderIndex"])->middleware(['auth'])->name('settings.slider.manage');
            Route::get('/create',[SettingsController::class,"sliderCreate"])->middleware(['auth'])->name('settings.slider.create');
            Route::post('/store',[SettingsController::class,"sliderStore"])->middleware(['auth'])->name('settings.slider.store');
            Route::get('/edit/{id}',[SettingsController::class,"sliderEdit"])->middleware(['auth'])->name('settings.slider.edit');
            Route::post('/update/{id}',[SettingsController::class,"sliderUpdate"])->middleware(['auth'])->name('settings.slider.update');
            Route::get('/delete/{id}',[SettingsController::class,"sliderDelete"])->middleware(['auth'])->name('settings.slider.delete');

        });

    });

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
