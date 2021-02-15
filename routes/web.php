<?php

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


Route::prefix('api')->group(function (){
    Route::get('/categories',[\App\Http\Controllers\Backend\CategoryController::class,'apiIndex']);
    Route::post('/categories/attribute',[\App\Http\Controllers\Backend\CategoryController::class,'apiIndexAttribute']);
    Route::get('/cities/{provinceId}',[\App\Http\Controllers\Auth\RegisterController::class,'getAllCities']);

});

Route::prefix('administrator')->group(function (){
    Route::get('/',[\App\Http\Controllers\Backend\MainController::class,'mainPage']);
    Route::resource('categories',\App\Http\Controllers\Backend\CategoryController::class);
    Route::get('/categories/{id}/settings',[\App\Http\Controllers\Backend\CategoryController::class,'indexSetting'])->name('categories.indexSettings');
    Route::post('/categories/{id}/settings',[\App\Http\Controllers\Backend\CategoryController::class,'saveSetting']);
    Route::resource('attributes-group',\App\Http\Controllers\Backend\AttributeGroupController::class);
    Route::resource('attributes-value',\App\Http\Controllers\Backend\AttributeValueController::class);
    Route::resource('brands',\App\Http\Controllers\Backend\BrandController::class);
    Route::resource('photos',\App\Http\Controllers\Backend\PhotoController::class);
    Route::post('photos/upload',[\App\Http\Controllers\Backend\PhotoController::class,'upload'])->name('photos.upload');
    Route::resource('products',\App\Http\Controllers\Backend\ProductController::class);
    Route::resource('coupons',\App\Http\Controllers\Backend\CouponController::class);
});
Route::resource('/',\App\Http\Controllers\Frontend\HomeController::class);
Route::post('/register-user',[\App\Http\Controllers\Frontend\UserController::class,'register'])->name('user.register');

Route::get('/add-to-cart/{id}',[\App\Http\Controllers\Frontend\CartController::class,'addToCart'])->name('cart.add');
Route::post('/remove-item/{id}',[\App\Http\Controllers\Frontend\CartController::class,'removeItem'])->name('cart.remove');
Route::get('/cart',[\App\Http\Controllers\Frontend\CartController::class,'getCart'])->name('cart.cart');


Route::group(['middleware' => 'auth'],function (){
    Route::get('/profile', [\App\Http\Controllers\Frontend\UserController::class, 'profile'])->name('user.profile');
    Route::post('/coupon', [\App\Http\Controllers\Frontend\CouponController::class, 'addCoupon'])->name('coupon.add');
});
Auth::routes();

