<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Here is where you can use auth routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [AuthController::class,'login'])->name('loginUser');
Route::post('/login-user', [AuthController::class,'ajax_login'])->name('ajax.login.user');

//Google login
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

//google facebook
Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']); 

Route::get('/login-otp', [AuthController::class,'loginOTP'])->name('loginOTP');
Route::post('/send-login-otp', [AuthController::class,'ajax_sendLoginOTP'])->name('ajax.send.login.OTP');
Route::post('/login-otp', [AuthController::class,'ajax_loginWithOTP'])->name('ajax.login.OTP');

Route::get('/register', [AuthController::class,'register'])->name('registerUser');
Route::post('/register-user', [AuthController::class,'ajax_register'])->name('ajax.register.user');

Route::get('/recover-password', [AuthController::class,'recoverPassword'])->name('recoverPassword');
Route::post('/recover-password', [AuthController::class,'ajax_recoverPassword'])->name('ajax.recover.password');
Route::post('/reset-password', [AuthController::class,'ajax_resetPassword'])->name('ajax.reset.password');
Route::get('/logout', [AuthController::class,'logout'])->name('logoutUser');