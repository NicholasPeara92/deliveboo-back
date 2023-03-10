<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;

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
Route::get('restaurants', [RestaurantController::class, 'index']);
Route::get("restaurant/{slug}", [RestaurantController::class, 'show']); 

Route::get('products', [ProductController::class, 'index']);
Route::get("product/{slug}", [ProductController::class, 'show']); 

Route::get('categories', [CategoryController::class, 'index']);

Route::post('orders', [OrderController::class, 'store'] );
