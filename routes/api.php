<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderController;
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
    Route::get('searchShop',[ShopCntroller::class,'searchShop']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'product'

], function ($router) {
    Route::get('showProducts',[ProductController::class, 'showProducts']);
    Route::get('showProductDetails',[ProductController::class,'showProductDetails']);
    Route::get('searchProduct',[ProductController::class,'searchProduct']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'fav'

], function ($router) {
    Route::post('addToFvourite',[FavoriteController::class,'addToFvourite']);
    Route::post('removeFavourite',[FavoriteController::class,'removeFavourite']);
    Route::get('showFav',[FavoriteController::class,'showFav']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'order'

], function ($router) {
    Route::post('makeOrder',[OrderController::class,'makeOrder']);
    Route::post('addToCart',[OrderController::class,'addToCart']);
    Route::delete('removeFromCart',[OrderController::class,'removeFromCart']);
    Route::get('showCart',[OrderController::class,'showCart']);
    Route::post('editCart',[OrderController::class,'editCart']);
    Route::post('order',[OrderController::class,'order']);
    Route::get('showOrderDetails',[OrderController::class,'showOrderDetails']);
    Route::get('showOrders',[OrderController::class,'showOrders']);
    Route::post('cancelOrder',[OrderController::class,'cancelOrder']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'address'

], function ($router) {
    Route::get('showParentRegion',[AddressController::class,'showParentRegion']);
    Route::get('showChildRegion',[AddressController::class,'showChildRegion']);
    Route::post('removeFavourite',[FavoriteController::class,'removeFavourite']);
    Route::get('showFav',[FavoriteController::class,'showFav']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'admin'

], function() {
    Route::post('addShop',[AdminController::class,'addShop']);
    Route::post('addProduct',[AdminController::class,'addProduct']);
    Route::get('showOrders',[AdminController::class,'showOrders']);
    Route::post('updateStatus',[AdminController::class,'updateStatus']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'notification'

], function() {
    Route::get('showNotifications',[NotificationController::class,'showNotifications']);
    Route::get('readNotifications',[NotificationController::class,'readNotifications']);
    Route::get('unreadNotifications',[NotificationController::class,'unreadNotifications']);
    Route::get('showOrder',[OrderController::class,'showOrder']);
});
