<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\OrderController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user()->id;
        $restaurant = Restaurant::where('user_id', $user)->first();
        return view('admin.dashboard', compact('restaurant'));
    })->name('dashboard');

    Route::resource('restaurant', RestaurantController::class)->parameters(['restaurants' => 'restaurant:slug']);
    Route::resource('product', ProductController::class)->parameters(['products' => 'product:slug']);
    Route::resource('order', OrderController::class)->parameters(['products' => 'order:id']);
});

require __DIR__.'/auth.php';
