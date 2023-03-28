<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CommonController;
use App\Http\Controllers\Api\Customer\Auth\AuthController;
use App\Http\Controllers\Api\Customer\HomeController;
use App\Http\Controllers\Api\Customer\UserController;
use App\Http\Controllers\Api\Customer\MemberController;
use App\Http\Controllers\Api\Common\ModuleController;
use App\Http\Controllers\Api\Customer\AddressController;
use App\Http\Controllers\Api\Customer\ProductController;
use App\Http\Controllers\Api\Customer\CartController;
use App\Http\Controllers\Api\Customer\OrderController;
use App\Http\Controllers\Api\Customer\ReviewController;
use App\Http\Controllers\Api\Customer\FAQController;
use App\Http\Controllers\Api\Customer\NotificationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// CMS Pages
Route::get('cms-pages', [CommonController::class, 'cmsPages']);
Route::get('general-info', [CommonController::class, 'generalInformation']);

// COUTRTY, STATE, CITY LIST
Route::get('get_countries', 'Api\Customer\CountryController@index');
Route::get('get_state', 'Api\Customer\StateController@index');
Route::get('get_cities', 'Api\Customer\CityController@index');

// LANGUAGE
Route::get('get_languages', [LanguageController::class, 'index']);

// MODULE
Route::get('module-list', [ModuleController::class, 'index']);
	
Route::prefix('customer')->group( function() {
    
	// Login, Registration, OTP
	Route::post('login', [AuthController::class, 'login']);
	Route::post('login-with-otp', [AuthController::class, 'loginWithOTP']);
	Route::post('login-with-social', [AuthController::class, 'loginWithSocial']);
    Route::post('registration', [AuthController::class, 'registration']);
    Route::post('activeAccount', [AuthController::class, 'active']);
    Route::post('sendOTP', [AuthController::class, 'sendOTP']);
    Route::post('verifyOTP', [AuthController::class, 'verifyOTP']);
    Route::post('recover-password', [AuthController::class, 'recoverPassword']);
    Route::post('reset-password', [AuthController::class, 'resetPassword']);

	//Slider
	Route::post('slider', [SliderController::class, 'index']);
	
	// Dashboard
	Route::get('get_dashboard_data', [HomeController::class, 'dashboard']);
	
	// Product, Category
	Route::post('categories', [ProductController::class, 'categories']);
	Route::post('get_categoryProducts', [ProductController::class, 'categoryProducts']);
	Route::post('products', [ProductController::class, 'index']);
	Route::get('product/{id}', [ProductController::class, 'single']);
	
	//FAQs
	Route::get('faqs',[FAQController::class,'index']);
	
	// With Login API's
    Route::middleware(['auth:api'])->group( function (){
		
		// Auth
		Route::get('logout', [AuthController::class, 'logout']);
		Route::post('change-password', [AuthController::class, 'changePassword']);
		Route::post('update-device-details', [AuthController::class, 'updateDeviceDetails']);
		Route::get('delete-acccount', [AuthController::class, 'deleteAccount']);
		
		//USER
		Route::get('get_myProfile', [UserController::class, 'profile']);
		Route::post('updateProfile', [UserController::class, 'update']);
		Route::post('update_profilePicture', [UserController::class, 'updateProfilePicture']);
		
		Route::get('get_addresses', [AddressController::class, 'index']);
		Route::post('save_address', [AddressController::class, 'save_address']);
		Route::post('delete_address', [AddressController::class, 'delete_address']);
		
		Route::post('save_generalSettings', [UserController::class, 'savegeneralSettings']);
		Route::get('get_generalSettings', [UserController::class, 'getgeneralSettings']);
		Route::post('save-notification-settings', [NotificationController::class, 'saveNotificationSettings']);
		Route::post('test-notification', [NotificationController::class, 'testNotification']);
		
		// PAYMENT / WALLET
		Route::get('wallet', [UserController::class, 'wallet']);
		Route::get('get-my-code', [UserController::class, 'getMyCode']);
		
		// MEMBER MANAGEMENT
		Route::post('save_member', [MemberController::class, 'saveMember']);
		Route::post('members', [MemberController::class, 'index']);
		Route::post('delete_member', [MemberController::class, 'delete_member']);
		
    	// OFFERS
		Route::post('offers', 'Api\Customer\OfferController@index');
		Route::get('offer/{id}', 'Api\Customer\OfferController@show');
		
		// COUPONS
		Route::post('coupons', 'Api\Customer\CouponController@index');
		Route::get('offer/{id}', 'Api\Customer\CouponController@show');

		// CART, ORDER
		Route::get('carts', [CartController::class, 'index']);
		Route::post('addToCart', [CartController::class, 'add']);
		Route::post('updateCart', [CartController::class, 'update']);
		Route::post('deleteCart', [CartController::class, 'delete']);
		Route::get('checkout', [CartController::class, 'checkout']);
		Route::post('place_order', [OrderController::class, 'create']);
		Route::post('purchase-history', [OrderController::class, 'orders']);

		// NOTIFICATION
		Route::get('notifications','Api\Customer\NotificationController@list');
		
		// RATINGS / REVIEWS
		Route::post('submitReview','Api\Customer\ReviewController@submit');
    });
});