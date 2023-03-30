<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\UserManagementController;
use App\Http\Controllers\Backend\LocationController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\PaymentGatewayController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryManagementController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\OfferController;
use App\Http\Controllers\Backend\FaqTopicController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\LeadershipsController;
use App\Http\Controllers\Backend\AccoladesController;
use App\Http\Controllers\Backend\CompanyController;
use App\Http\Controllers\Backend\PressController;
use App\Http\Controllers\Backend\LifeatintuitiveController;
use App\Http\Controllers\Backend\CasestudyController;
use App\Http\Controllers\Backend\PortfolioController;
use App\Http\Controllers\Backend\YearsController;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can use Backend routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// BACKEND
Route::group(['middleware' => ['auth'],'prefix' => 'backend','namespace' => 'Backend'], function() {

	Route::get('/',[BackendController::class,'index'])->name('dashboard');
	
	// POSTS 
	Route::get('list/{post_type}', [PostController::class,'index'])->name('page.post.management');
	Route::get('posts/{post_type}/add', [PostController::class,'create'])->name('page.post.create');
	Route::get('posts/{post_type}/{id}', [PostController::class,'show'])->name('page.post.edit');
	Route::post('posts/store', [PostController::class,'store'])->name('ajax.post.store');
	Route::post('posts/ajax', [PostController::class,'ajax_list'])->name('ajax.post.list');
	Route::post('change-posts-status', [PostController::class,'change_status'])->name('ajax.post.change.status');
	Route::post('delete-posts', [PostController::class,'destroy'])->name('ajax.post.delete');
	Route::post('get-posts-category-list', [PostController::class, 'categoryList'])->name('ajax.post.category.list');

	//Service
	Route::get('servicelist/{service_type}', [ServiceController::class,'index'])->name('page.service.management');
	Route::get('service/{post_type}/add', [ServiceController::class,'create'])->name('page.service.create');
	Route::get('service/{post_type}/{id}', [ServiceController::class,'show'])->name('page.service.edit');
	Route::post('service/store', [ServiceController::class,'store'])->name('ajax.service.store');
	Route::post('service/ajax', [ServiceController::class,'ajax_list'])->name('ajax.service.list');
	Route::post('change-service-status', [ServiceController::class,'change_status'])->name('ajax.service.change.status');
	Route::post('delete-service', [ServiceController::class,'destroy'])->name('ajax.service.delete');
	Route::post('get-posts-category-list', [PostController::class, 'categoryList'])->name('ajax.post.category.list');
	
	//Service Position Order
	Route::post('service-order-list', [ServiceController::class, 'serviceOrderList'])->name('ajax.post.service.order.list');
	
	// Users (Roles Wise Management)
	Route::get('manage/{role}', [UserManagementController::class,'index'])->name('user.list');
	Route::get('manage/{role}/add', [UserManagementController::class,'create'])->name('user.management.add');
	Route::get('manage/{role}/{id}', [UserManagementController::class,'show'])->name('user.management.edit');
	Route::post('manage/store', [UserManagementController::class,'store'])->name('user.management.store');
	Route::get('manage-user/ajax', [UserManagementController::class,'ajax_list'])->name('ajax.user.management.list');
	Route::post('manage-user/status', [UserManagementController::class,'change_status'])->name('ajax.user.change.status');
	Route::post('manage-user/delete', [UserManagementController::class,'destroy'])->name('ajax.user.management.delete');
	Route::post('/update-wallet', [UserManagementController::class, 'updateWallet'])->name('ajax.user.update.wallet');
	Route::post('/wallet-history', [UserManagementController::class, 'walletHistory'])->name('ajax.user.wallet.history');
	
	// Profile Management
	Route::get('profile', [ProfileController::class,'index'])->name('page.my-profile');
	Route::post('profile-update', [ProfileController::class,'ajax_update'])->name('ajax.profile.update');
	Route::get('change-password',[ProfileController::class, 'change_password'])->name('page.change.password');
	Route::post('change_password',[ProfileController::class, 'ajax_change_password'])->name('ajax.change.password');
	
	// Sliders 
	Route::resource('sliders', '\App\Http\Controllers\Backend\SliderController');
	Route::post('/slider/slidebox',[SliderController::class, 'slideBox'])->name('ajax.slider.open.slide.box');
	Route::post('/slider-list',[SliderController::class, 'ajax_list'])->name('ajax.slider.list');
	Route::post('/delete-slider',[SliderController::class, 'destroy'])->name('ajax.delete.slider');
	Route::post('/store-slide',[SliderController::class, 'storeSlide'])->name('ajax.slider.store.slide');
	Route::post('/change-status',[SliderController::class, 'changeStatus'])->name('ajax.slider.change.status');
	Route::post('/delete-slide',[SliderController::class, 'destroy_slide'])->name('ajax.delete.slide');
	
	// CATEGORIES 
	// Route::resource('categories', '\App\Http\Controllers\Backend\CategoryManagementController');
	Route::get('categories/{module}', [CategoryManagementController::class, 'index'])->name('category.list');
	Route::get('categories/{module}/add', [CategoryManagementController::class, 'create'])->name('category.add');
	Route::get('categories/{module}/{id}', [CategoryManagementController::class, 'edit'])->name('category.edit');
	Route::post('categories/store', [CategoryManagementController::class, 'store'])->name('category.store');
	Route::post('categories/ajax', [CategoryManagementController::class, 'ajax_list'])->name('ajax.category.list');
	Route::post('change-category-status', [CategoryManagementController::class, 'change_status'])->name('ajax.category.change.status');
	Route::post('delete-category',[CategoryManagementController::class, 'destroy'])->name('ajax.category.delete');
	
	//Years
	Route::resource('years', '\App\Http\Controllers\Backend\YearsController');
	Route::post('/years/ajax', [YearsController::class, 'ajax_list'])->name('ajax.years.list');
	Route::post('/saveyears', [YearsController::class, 'store'])->name('ajax.save.years');
	Route::post('change-years-status', [YearsController::class, 'change_status'])->name('ajax.years.change.status');
	Route::post('delete-years', [YearsController::class, 'destroy'])->name('ajax.years.delete');


	//Leader
	Route::resource('leader', '\App\Http\Controllers\Backend\LeadershipsController');
	Route::post('/leader/ajax', [LeadershipsController::class, 'ajax_list'])->name('ajax.leader.list');
	Route::post('/saveleader', [LeadershipsController::class, 'store'])->name('ajax.save.leader');
	// Route::post('/delete-leader',[SliderController::class, 'destroy'])->name('ajax.delete.leader');
	Route::post('change-leader-status', [LeadershipsController::class, 'change_status'])->name('ajax.leader.change.status');
	Route::post('get-leader-category-list', [LeadershipsController::class, 'categoryList'])->name('ajax.leader.category.list');
	Route::post('save-leader-category', [LeadershipsController::class, 'save_category'])->name('ajax.leader.save.category');
	Route::post('save-leader-variations', [LeadershipsController::class, 'saveVariations'])->name('ajax.leader.save.variation');
	Route::post('delete-leader', [LeadershipsController::class, 'destroy'])->name('ajax.leader.delete');
	Route::post('store/gallery', [LeadershipsController::class, 'storeGallery'])->name('ajax.leader.save.gallery');
	Route::post('/leadergetimages', [LeadershipsController::class, 'getleaderImages'])->name('leader.getimage.all');
	Route::post('files/leader/remove', [LeadershipsController::class, 'ImageremvoeFile'])->name('leader.file.remove');
	Route::post('save-leader-attribute', [LeadershipsController::class, 'saveAttribute'])->name('ajax.leader.save.attribute');
	Route::post('delete-leader-variation', [LeadershipsController::class, 'deleteVariation'])->name('ajax.leader.delete.variation');
	// PRODUCT
	Route::resource('products', '\App\Http\Controllers\Backend\ProductController');
	Route::post('/products/ajax', [ProductController::class, 'ajax_list'])->name('ajax.product.list');
	Route::post('/saveProduct', [ProductController::class, 'store'])->name('ajax.save.product');
	Route::post('change-product-status', [ProductController::class, 'change_status'])->name('ajax.product.change.status');
	Route::post('get-product-category-list', [ProductController::class, 'categoryList'])->name('ajax.product.category.list');
	Route::post('save-product-category', [ProductController::class, 'save_category'])->name('ajax.product.save.category');
	Route::post('save-product-variations', [ProductController::class, 'saveVariations'])->name('ajax.product.save.variation');
	Route::post('delete-product', [ProductController::class, 'destroy'])->name('ajax.product.delete');
	Route::post('store/gallery', [ProductController::class, 'storeGallery'])->name('ajax.product.save.gallery');
	Route::post('/productgetimages', [ProductController::class, 'getProductImages'])->name('product.getimage.all');
	Route::post('files/product/remove', [ProductController::class, 'ImageremvoeFile'])->name('product.file.remove');
	Route::post('save-product-attribute', [ProductController::class, 'saveAttribute'])->name('ajax.product.save.attribute');
	Route::post('delete-product-variation', [ProductController::class, 'deleteVariation'])->name('ajax.product.delete.variation');
	
	//Accolades
	Route::resource('accolades', '\App\Http\Controllers\Backend\AccoladesController');
	Route::post('store/accolades', [AccoladesController::class, 'store'])->name('ajax.store.accolades');
	Route::post('accolades', [AccoladesController::class, 'ajax_list'])->name('ajax.accolades.list');
	Route::post('delete-accolades', [AccoladesController::class, 'destroy'])->name('ajax.delete.accolades');
	Route::post('deleteitem', [AccoladesController::class, 'deleteitem'])->name('ajax.deleteitem.accolades');

	//Portfolio
	Route::resource('portfolio', '\App\Http\Controllers\Backend\PortfolioController');
	Route::post('store/portfolio', [PortfolioController::class, 'store'])->name('ajax.store.portfolio');
	Route::post('portfolio', [PortfolioController::class, 'ajax_list'])->name('ajax.portfolio.list');
	Route::post('delete-portfolio', [PortfolioController::class, 'destroy'])->name('ajax.delete.portfolio');
	Route::post('deleteitem', [PortfolioController::class, 'deleteitem'])->name('ajax.deleteitem.portfolio');
	
	
	//Instive
	Route::get('instive', [AccoladesController::class, 'instiveindex'])->name('ajax.instiveindex.index');
	Route::get('instive/create', [AccoladesController::class, 'instiveicreate'])->name('ajax.instiveindex.create');
	Route::post('instive/store', [AccoladesController::class, 'instiveistore'])->name('ajax.instiveindex.store');
	Route::post('instive/list', [AccoladesController::class, 'instivelist'])->name('ajax.instiveindex.list');
	Route::get('instive/edit/{id}', [AccoladesController::class, 'instiveedit'])->name('ajax.instiveindex.edit');
	Route::post('delete-instive', [AccoladesController::class, 'instivedestroy'])->name('ajax.instiveindex.delete');


	//easier
	Route::get('easier', [AccoladesController::class, 'easierindex'])->name('ajax.easier.index');
	Route::get('easier/create', [AccoladesController::class, 'easiericreate'])->name('ajax.easier.create');
	Route::post('easier/store', [AccoladesController::class, 'easieristore'])->name('ajax.easier.store');
	Route::post('easier/list', [AccoladesController::class, 'easierlist'])->name('ajax.easier.list');
	Route::get('easier/edit/{id}', [AccoladesController::class, 'easieredit'])->name('ajax.easier.edit');
	Route::post('delete-easier', [AccoladesController::class, 'easierdestroy'])->name('ajax.easier.delete');


	//Superpowers
	Route::get('superpowers', [AccoladesController::class, 'superpowersindex'])->name('ajax.superpowers.index');
	Route::get('superpowers/create', [AccoladesController::class, 'superpowersicreate'])->name('ajax.superpowers.create');
	Route::post('superpowers/store', [AccoladesController::class, 'superpowersistore'])->name('ajax.superpowers.store');
	Route::post('superpowers/list', [AccoladesController::class, 'superpowerslist'])->name('ajax.superpowers.list');
	Route::get('superpowers/edit/{id}', [AccoladesController::class, 'superpowersedit'])->name('ajax.superpowers.edit');
	Route::post('delete-superpowers', [AccoladesController::class, 'superpowersdestroy'])->name('ajax.superpowers.delete');


	//Section
	Route::get('section', [AccoladesController::class, 'setionindex'])->name('ajax.setionindex.index');
	Route::get('section/create', [AccoladesController::class, 'sectioncreate'])->name('ajax.setionindex.create');
	Route::post('section/store', [AccoladesController::class, 'sectionstore'])->name('ajax.setionindex.store');
	Route::post('section/list', [AccoladesController::class, 'setionlist'])->name('ajax.setion.list');
	Route::get('section/edit/{id}', [AccoladesController::class, 'sectionedit'])->name('ajax.setionindex.edit');
	Route::post('delete-section', [AccoladesController::class, 'sectiondestroy'])->name('ajax.setion.delete');
	Route::post('delete-contact', [AccoladesController::class, 'destroycontact'])->name('ajax.delete.contact');
	Route::post('ajax/contact/list', [AccoladesController::class, 'ajax_Contactlist'])->name('ajax.contact.list');


	//Comapny
	Route::resource('company', '\App\Http\Controllers\Backend\CompanyController');
	Route::post('store/company', [CompanyController::class, 'store'])->name('ajax.store.company');
	Route::post('company', [CompanyController::class, 'ajax_list'])->name('ajax.company.list');
	Route::post('delete-company', [CompanyController::class, 'destroy'])->name('ajax.delete.company');
	//PressRealease
	Route::resource('pressrelease', '\App\Http\Controllers\Backend\PressController');
	Route::post('store/pressrelease', [PressController::class, 'store'])->name('ajax.store.pressrelease');
	Route::post('pressrelease', [PressController::class, 'ajax_list'])->name('ajax.company.pressrelease');
	Route::post('delete-pressrelease', [PressController::class, 'destroy'])->name('ajax.delete.pressrelease');

	//Lifeat set
	Route::resource('lifeatinsetive', '\App\Http\Controllers\Backend\LifeatintuitiveController');
	Route::post('store/lifeatinsetive', [LifeatintuitiveController::class, 'store'])->name('ajax.store.lifeatinsetive');
	Route::post('lifeatinsetive', [LifeatintuitiveController::class, 'ajax_list'])->name('ajax.company.lifeatinsetive');
	Route::post('delete-lifeatinsetive', [LifeatintuitiveController::class, 'destroy'])->name('ajax.delete.lifeatinsetive');

	//casestudy
	// Route::resource('casestudy', '\App\Http\Controllers\Backend\CasestudyController');
	// Route::post('store/casestudy', [CasestudyController::class, 'store'])->name('admin.casestudy.store');
	// Route::post('delete-casestudy', [CasestudyController::class, 'destroy'])->name('ajax.delete.casestudy');
	Route::group(['prefix' => 'casestudy'], function() {
		Route::post('ajax', [CasestudyController::class, 'ajax_list'])->name('admin.casestudy.list');
		Route::get('list', [CasestudyController::class, 'index'])->name('admin.casestudy.index');
		Route::get('add', [CasestudyController::class, 'create'])->name('admin.casestudy.add');
		Route::post('store', [CasestudyController::class, 'store'])->name('admin.casestudy.store');
		Route::post('delete', [CasestudyController::class, 'destroy'])->name('admin.casestudy.delete');
		Route::get('edit/{id}', [CasestudyController::class, 'edit'])->name('admin.casestudy.edit');
		Route::post('update', [CasestudyController::class, 'update'])->name('admin.casestudy.update');
	});

	//FAQs
	Route::resource('faqs', '\App\Http\Controllers\Backend\FaqController');
	Route::post('store/faq', [FaqController::class, 'store'])->name('ajax.store.faq');
	Route::post('faqs', [FaqController::class, 'ajax_list'])->name('ajax.FAQ.list');
	Route::post('delete-faq', [FaqController::class, 'destroy'])->name('ajax.delete.FAQ');
	
	Route::resource('faq-topics', '\App\Http\Controllers\Backend\FaqTopicController');
	Route::post('store/faq-topic', [FaqTopicController::class, 'store'])->name('ajax.store.faq.topic');
	Route::post('faq-topics', [FaqTopicController::class, 'ajax_list'])->name('ajax.FAQ.topic.list');
	Route::post('delete-faq-topic', [FaqTopicController::class, 'destroy'])->name('ajax.delete.faq.topic');
	
	
	// LOCATIONS
	Route::get('countries', [LocationController::class, 'countries'])->name('page.county.list');
	Route::get('cities', [LocationController::class, 'cities'])->name('page.city.list');
	Route::get('states', [LocationController::class, 'states'])->name('page.state.list');
	Route::get('areas', [LocationController::class, 'areas'])->name('page.area.list');
	Route::post('location-ajax', [LocationController::class,'ajax_list'])->name('ajax.location.list');
	Route::post('location-store', [LocationController::class,'store'])->name('ajax.location.store');
	Route::post('location-show', [LocationController::class,'ajax_show'])->name('ajax.location.show');
	Route::post('location-delete',[LocationController::class,'destroy'])->name('ajax.location.delete');
	
	// Offer
	Route::resource('offers', '\App\Http\Controllers\Backend\OfferController');
	Route::post('/offer/ajax', [OfferController::class, 'ajax'])->name('ajax.offer.list');
	Route::post('/offer/status', [OfferController::class, 'changeStatus'])->name('ajax.offer.change.status');
	Route::post('/delete/offer', [OfferController::class, 'destroy'])->name('ajax.delete.offer');
	
	// Coupon
	Route::resource('coupons', '\App\Http\Controllers\Backend\CouponController');
	Route::post('/coupon/ajax', [CouponController::class, 'ajax'])->name('ajax.coupon.list');
	Route::post('/coupon/status', [CouponController::class, 'changeStatus'])->name('ajax.coupon.change.status');
	Route::post('/delete/coupon', [CouponController::class, 'destroy'])->name('ajax.delete.coupon');

	// Subscribe Mail
	Route::get('subscribe/mail',[CouponController::class,'mail'])->name('subscribe/mail');
	Route::post('ajax/email/list',[CouponController::class ,'ajax_emailList'])->name('ajax.email.list');
	Route::post('ajax/delete/email',[CouponController::class ,'ajax_deleteMail'])->name('ajax.delete.email');

	// user Service
	Route::get('user/service',[CouponController::class,'serviceList'])->name('user.service');
	Route::post('ajax/user/service/list',[CouponController::class,'ajax_serviceList'])->name('ajax.user.service.list');
	Route::post('ajax/user/service/delete',[CouponController::class,'ajax_serviceDelete'])->name('ajax.user.service.delete');
	
	// ORDERS
	//Route::resource('orders', '\App\Http\Controllers\Backend\OrderController');
	Route::get('orders', [OrderController::class, 'index'])->name('page.order.list');
	Route::get('orders/{id}', [OrderController::class, 'show'])->name('page.order.details');
	Route::get('/open-orders', [OrderController::class, 'open'])->name('page.open.order.list');
	Route::post('/orders/ajax', [OrderController::class, 'ajax'])->name('ajax.order.list');
	Route::post('/orders/status', [OrderController::class, 'status'])->name('orders_status');
	Route::post('/orderCount', [OrderController::class, 'ajax_count'])->name('ajax_orderCount');
	Route::post('/checkNewOrders', [OrderController::class, 'ajax_checkNewOrders'])->name('ajax_checkNewOrders');
	
	// SETTINGS
	Route::get('/general-settings', [SettingController::class, 'general_settings'])->name('page.general-settings');
	Route::post('/general-setting/store', [SettingController::class, 'store'])->name('ajax.store.general-settings');
	Route::post('/general-setting/store-logo', [SettingController::class, 'store_logo'])->name('ajax.store.logo');
	Route::get('/paymentGateways', [PaymentGatewayController::class, 'index'])->name('paymentGateways');
	Route::post('/paymentGateway/list', [PaymentGatewayController::class, 'ajax'])->name('ajax.paymentGateway.list');
	Route::post('/paymentGateway/edit', [PaymentGatewayController::class, 'ajax'])->name('paymentGateway.edit');
	Route::post('/paymentGateway/status', [PaymentGatewayController::class, 'change_status'])->name('change.paymentGateway.status');
});