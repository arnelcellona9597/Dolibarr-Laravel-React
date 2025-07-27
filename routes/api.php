<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'dolibarr'], function() {
    Route::get('/get-token',  [UserController::class, 'getToken']);
    Route::get('/get-products',  [ProductController::class, 'getProducts']);
    Route::get('/get-categories',  [CategoryController::class, 'getCategories']);
    Route::get('/get-latest-products-updates/{hours?}', [ProductController::class, 'getLatestProductsUpdates']);
    Route::get('/get-latest-categories-updates/{hours?}', [CategoryController::class, 'getLatestCategoriesUpdates']);
});