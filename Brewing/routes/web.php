<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoffeeBeansController;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ViewController;
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
       Route::get('manage', [CoffeeController::class, 'manage'])->name('coffee.manage');
       Route::post('toggle/{id}', [CoffeeController::class, 'status'])->name('coffee.status');
       Route::get('edit/{id}', [CoffeeController::class, 'edit'])->name('coffee.form-edit');
       Route::post('update/{id}', [CoffeeController::class, 'update'])->name('coffee.update');
    });

    Route::group(['prefix' => 'coffee_beans'], function() {
       Route::get('manage', [CoffeeBeansController::class, 'manage'])->name('coffee-beans.manage');
       Route::post('store', [CoffeeBeansController::class, 'store'])->name('coffee-beans.store');
    });

    Route::group(['prefix' => 'orders'], function() {
       Route::get('manage', [OrderController::class, 'manage'])->name('order.manage');
       Route::get('view/{id}', [OrderController::class, 'view'])->name('order.view');
       Route::get('delete', [OrderController::class, 'delete'])->name('order.delete');
       Route::get('edit/{id}', [OrderController::class, 'edit'])->name('order.edit');
       Route::get('editQuantityCart', [OrderController::class, 'editQuantityCart'])->name('editQuantityCart');
       Route::get('deleteCupCart', [OrderController::class, 'deleteCupCart'])->name('deleteCupCart');
    });

    Route::group(['prefix' => 'customers'], function () {
       Route::get('manage', [CustomerController::class, 'manage'])->name('customer.manage');
    });
});

Route::group(['prefix' => 'coffee'], function() {
    Route::get('/', [ViewController::class, 'shop'])->name('coffee.shop');
    Route::get('addToCart/{id}', [ViewController::class, 'addToCart'])->name('coffee.addToCart');
    Route::get('detail/{id}', [ViewController::class, 'detail'])->name('coffee.detail');
    Route::get('showCart', [ViewController::class, 'showCart'])->name('coffee.showCart');
    Route::post('order', [ViewController::class, 'order'])->name('coffee.order');
    Route::get('search', [ViewController::class, 'search'])->name('coffee.search');
    Route::get('priceHtl', [ViewController::class, 'priceHtl'])->name('price-htl');
    Route::get('priceLth', [ViewController::class, 'priceLth'])->name('price-lth');
});
