<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SupportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Localization route
Route::get('lang/{locale}', 'HomeController@lang')->name('locale');

// SUPPORT
Route::get('clear', [SupportController::class, 'clear_cache']);
Route::get('caches', [SupportController::class, 'caches']);
Route::get('migrate', [SupportController::class, 'migration']);
Route::get('seed', [SupportController::class, 'seeding']);

Route::get('encrypt-decrypt/{type}', [SupportController::class, 'encrypt_decrypt']);

// AUTH
Auth::routes();

// For Auth
require_once 'layouts/auth.php';

// For Website
require_once 'layouts/theme.php';

// For Backend
require_once 'layouts/backend.php';

// For Developer
require_once 'layouts/developer.php';

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');