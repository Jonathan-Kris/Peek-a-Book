<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UpdateProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/{param?}', [HomeController::class, "index"])->where('param', 'home');

// Authentication
Route::get('/register', [AuthController::class, "indexRegister"]);
Route::post('/api/register', [AuthController::class, "register"]);

Route::get('/login',  [AuthController::class, "indexLogin"]);
Route::post('/api/login',  [AuthController::class, "login"]);

Route::get('/logout', [AuthController::class, "logout"]);

// For seller
Route::get('/insert-product', [ProductController::class, "indexInsert"])->middleware('security');
Route::post('/api/insert-product', [ProductController::class, "store"])->middleware('security');

Route::get('/update-product/{product_id}', [ProductController::class, "indexUpdate"])->middleware('security')->name('updateProductGet');
Route::post('/api/update-product/{product_id}', [ProductController::class, "update"])->middleware('security')->name('updateProductPost');

Route::get('/manage-user', [UserController::class, "index"])->middleware('security');
Route::delete('/delete-user/{id}', [UserController::class, "delete"])->middleware('security');

// Product Detail
Route::get('/product/{product_id}',[ProductController::class, 'show'])->name('productDetail');

// Update Profile
Route::get('/update-profile/{user_id}', [UpdateProfileController::class, 'index']);
Route::post('/update-profile/{user_id}', [UpdateProfileController::class, 'update']);

// Search Page
Route::get('/search-page', [SearchController::class, 'index']);
Route::get('/search-product', [SearchController::class, 'searching']);

// Cart
Route::get('/add-to-cart/{product_id}',[ProductController::class, 'add_to_cart']);
Route::get('/cart/{user_id}',[CartController::class, 'index']);
