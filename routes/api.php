<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopCntroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::post('/user-profile', [AuthController::class, 'editUserProfile']);
    
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'shop'

], function ($router) {
    Route::get('showShops',[ShopCntroller::class,'showShops']);
    Route::get('showShopDetails',[ShopCntroller::class,'showShopDetails']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'product'

], function ($router) {
    Route::get('showProducts',[ProductController::class, 'showProducts']);
    Route::get('showProductDetails',[ProductController::class,'showProductDetails']);
});