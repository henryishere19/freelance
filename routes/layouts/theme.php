<?php

use App\Http\Controllers\Theme\AccountController;
use App\Http\Controllers\Theme\CmsController;
use App\Http\Controllers\Theme\ShopController;
use App\Http\Controllers\Theme\CartController;
use App\Http\Controllers\Theme\CheckoutController;
use App\Http\Controllers\Theme\OrderController;
use App\Http\Controllers\Theme\BlogController;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Theme Routes
|--------------------------------------------------------------------------
|
| Here is where you can use theme routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// FRONT
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('firstPage');

// Country / State / City / Area
Route::post('country/list','CountryController@store')->name('countryList');
Route::post('state/list','StateController@list')->name('stateList');
Route::post('city/list','CityController@list')->name('cityList');

// CMS
Route::get('abouts-us', [CmsController::class,'aboutUs'])->name('about-us');
Route::get('/thank-you', [CmsController::class,'thankyou'])->name('thankyou');

Route::get('/contact-us', [CmsController::class,'contactUs'])->name('contact-us');
Route::post('/contact-us-add', [CmsController::class,'contactUsadd'])->name('contact-usadd');
Route::post('/subscribe-us', [CmsController::class,'subscribeus'])->name('subscribeus');
Route::get('/lifeat', [CmsController::class,'lifeat'])->name('lifeat');
Route::post('/service-us', [CmsController::class,'serviceus'])->name('serviceus');
Route::get('/leader-ship', [CmsController::class,'leadership'])->name('leadership');


Route::get('/terms', [CmsController::class,'terms'])->name('terms');
Route::get('/privacy-statement', [CmsController::class,'privacy'])->name('privacy');
Route::get('/cookie-policy', [CmsController::class,'cookie_privacy'])->name('privacy-policy');
Route::get('/refund', [CmsController::class,'refund'])->name('refund');

//BLOG
Route::get('/blog', [BlogController::class,'index'])->name('blog.list');
Route::get('/blog/{slug}', [BlogController::class,'show'])->name('blog.details');
Route::post('/blog/filter', [BlogController::class,'filterblog'])->name('ajax.category.post.list');


//Privacy

Route::get('/privacy-statement', [CmsController::class,'privacy'])->name('privacy');

//Service
Route::get('/service/{slug}', [BlogController::class,'servicecloud'])->name('service.view.one');



// SHOP
Route::get('shop',[ShopController::class,'index'])->name('shopPage');
Route::get('category/{slug}',[ShopController::class,'categoryProducts'])->name('page.categoryProducts');
Route::get('products/{slug}',[ShopController::class,'show'])->name('productDetails');
Route::get('/cart', [CartController::class, 'index'])->name('cartPage');
Route::get('/wishlist', [ShopController::class, 'wish'])->name('page.wishList');
Route::post('/wishlist', [ShopController::class, 'ajax_wishlist'])->name('ajax.wishlist');
Route::post('/product-list', [ShopController::class, 'ajax_list'])->name('ajax.product.list');
Route::post('/cart-count', [CartController::class, 'cartCount'])->name('ajax.cartCount');
Route::post('/cartList', [CartController::class, 'ajax_list'])->name('ajax.cartList');
Route::post('/addtoCart', [CartController::class, 'ajax_add'])->name('ajax.addtoCart');
Route::post('/removeToCart', [CartController::class, 'deleteCart'])->name('ajax.removeToCart');
Route::get('/checkout', [CartController::class, 'checkOut'])->name('checkOutPage');
Route::post('/checkout', [CartController::class, 'ajax_checkout'])->name('ajax.checkout.list');

// contact
Route::post('store/contact', [ShopController::class, 'store'])->name('store.contact');
Route::get('contact/list', [ShopController::class, 'list'])->name('contact.list');


// ORDER
Route::post('/checkNewOrder', 'HomeController@ajax_checkNewOrder')->name('checkNewOrder');
Route::post('/create-order', [OrderController::class, 'create'])->name('createOrder');
Route::get('/confirm-order', [OrderController::class, 'confirm'])->name('confirmOrder');
Route::get('/order-success', [OrderController::class, 'orderSuccess'])->name('order_successPage');
Route::get('/order-failed', [OrderController::class, 'orderFailed'])->name('order_failedPage');
Route::get('/verifyPayment/{id}', [OrderController::class, 'verifyPayment'])->name('verifyPayment');

// MY Account
Route::post('/loginPortal', 'Auth\LoginController@loginUser')->name('loginPortal');
Route::get('/my-account', 'theme\AccountController@index')->name('myAccount');
Route::get('/my-orders', 'theme\AccountController@myOrders')->name('myOrders');
Route::get('/wish-list', 'theme\AccountController@wishList')->name('myWishList');
Route::get('/profile-settings', 'theme\AccountController@settings')->name('profileSettings');
Route::post('/saveAddress', 'theme\AccountController@ajax_saveAddress')->name('saveAddress');
Route::post('/updateProfile', 'theme\AccountController@updateProfile')->name('updateProfile');
Route::post('/ajax_myOrders', 'theme\AccountController@ajax_myOrders')->name('ajax_myOrders');

// Subscribe
Route::post('ajax_subscribe' ,[HomeController::class ,'subscribe'])->name('ajax_subscribe');
Route::get('/press-release', [HomeController::class,'press_release'])->name('press-release');
Route::get('/life-at-intuitive', [HomeController::class,'lifeatnew'])->name('lifeatnew');
Route::get('/innovation-portfolio', [HomeController::class,'portfolio'])->name('portfolio');
Route::get('/careers', [HomeController::class,'carear'])->name('carear');
Route::get('/view/job/{boardid}/{jobid}', [HomeController::class,'carearviewjob'])->name('carearviewjob');
Route::get('/aws', [HomeController::class,'aws'])->name('aws');
Route::post('adminApis/save_media', [CmsController::class,'save_media'])->name('save_media');



Route::get('/case-study', [CmsController::class,'case_study'])->name('case-study');