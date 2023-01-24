<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\AdminController;

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

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminController::class, 'admin'])->name('login-form');
    Route::get('register', [AdminController::class, 'register'])->name('register-form');
    Route::post('signup', [AdminController::class, 'signup'])->name('processRegister');
    Route::post('process', [AdminController::class, 'check'])->name('processLogin');
    Route::get('logout', [AdminController::class, 'logout'])->name('logout');
});

Route::middleware('auth')->prefix('admin')->group(function() {
    Route::group(['prefix' => 'coffee'], function() {
       Route::get('create', [CoffeeController::class, 'create'])->name('coffee.create');
       Route::post('store', [CoffeeController::class, 'store'])->name('coffee.store');
    });
});

Route::group(['prefix' => 'coffee'], function() {
    Route::get('/', [ViewController::class, 'shop'])->name('coffee.shop');
});
