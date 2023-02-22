<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\CoffeeBeansController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/manage_api', [CoffeeController::class, 'manage_api'])->name('coffee_api.manage');
Route::get('/delete_api/{id}', [CoffeeController::class, 'delete_api'])->name('coffee_api.delete');
Route::post('/store', [CoffeeController::class, 'store_api'])->name('coffee.store_api');
Route::post('/upload', [CoffeeController::class, 'upload'])->name('coffee.upload');
Route::get('/manage_beans', [CoffeeBeansController::class, 'manage_beans'])->name('coffee-beans.manage_beans');
