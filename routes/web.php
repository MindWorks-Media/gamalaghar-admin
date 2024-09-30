<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeliveryPriceController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainCategoryController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SubCategoryController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'index'])->name('login');

Route::get('forgot-password', [ForgotPasswordController::class, 'index']);

Route::post('login', [LoginController::class, 'login']);



Route::group(['middleware' => 'auth'], function () {

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('admin/products/add-product', [ProductController::class, 'index']);
    Route::post('admin/products/add-product', [ProductController::class, 'store']);
    Route::get('admin/products/view-product', [ProductController::class, 'viewProduct']);
    Route::get('admin/products/view-product/delete/{id}', [ProductController::class, 'destroy']);
    Route::get('admin/products/edit/{slug}', [ProductController::class, 'edit']);
    Route::post('admin/products/update', [ProductController::class, 'update']);


    Route::get('admin/category/main-category', [MainCategoryController::class, 'index']);
    Route::post('admin/category/main-category', [MainCategoryController::class, 'store']);
    Route::get('admin/category/main-category/delete/{id}', [MainCategoryController::class, 'destroy']);
    Route::get('admin/category/main-category/edit/{slug}', [MainCategoryController::class, 'edit']);
    Route::post('admin/category/main-category/update', [MainCategoryController::class, 'update']);

    Route::get('admin/category/sub-category', [SubCategoryController::class, 'index']);
    Route::post('admin/category/sub-category', [SubCategoryController::class, 'store']);
    Route::get('admin/category/sub-category/edit/{slug}', [SubCategoryController::class, 'edit']);
    Route::post('admin/category/sub-category/update', [SubCategoryController::class, 'update']);
    Route::get('admin/category/sub-category/delete/{id}', [SubCategoryController::class, 'destroy']);

    Route::get('admin/property/size', [SizeController::class, 'index']);
    Route::post('admin/property/size', [SizeController::class, 'store']);
    Route::get('admin/property/size/edit/{slug}', [SizeController::class, 'edit']);
    Route::post('admin/property/size/update', [SizeController::class, 'update']);
    Route::get('admin/property/size/delete/{id}', [SizeController::class, 'destroy']);

    Route::get('admin/property/material', [MaterialController::class, 'index']);
    Route::post('admin/property/material', [MaterialController::class, 'store']);
    Route::get('admin/property/material/edit/{slug}', [MaterialController::class, 'edit']);
    Route::post('admin/property/material/update', [MaterialController::class, 'update']);
    Route::get('admin/property/material/delete/{id}', [MaterialController::class, 'destroy']);

    Route::get('admin/setting/province', [ProvinceController::class, 'index']);
    Route::post('admin/setting/province', [ProvinceController::class, 'store']);
    Route::get('admin/setting/province/edit/{slug}', [ProvinceController::class, 'edit']);
    Route::post('admin/setting/province/update', [ProvinceController::class, 'update']);
    Route::get('admin/setting/province/delete/{id}', [ProvinceController::class, 'destroy']);

    Route::get('admin/setting/city', [CityController::class, 'index']);
    Route::post('admin/setting/city', [CityController::class, 'store']);
    Route::get('admin/setting/city/edit/{slug}', [CityController::class, 'edit']);
    Route::post('admin/setting/city/update', [CityController::class, 'update']);
    Route::get('admin/setting/city/delete/{id}', [CityController::class, 'destroy']);


    Route::get('admin/setting/area', [AreaController::class, 'index']);
    Route::post('admin/setting/area', [AreaController::class, 'store']);
    Route::get('admin/setting/cities/{provinceId}', [AreaController::class, 'getCities']);
    Route::get('admin/setting/area/delete/{id}', [AreaController::class, 'destroy']);
    Route::get('admin/setting/area/edit/{slug}', [AreaController::class, 'edit']);


    Route::get('admin/setting/delivery-price', [DeliveryPriceController::class, 'index']);
    Route::post('admin/setting/delivery-charge', [DeliveryPriceController::class, 'deliveryCharge']);


    Route::get('admin/orders', [OrderController::class, 'index']);
    Route::get('admin/orders/search', [OrderController::class, 'searchOrder']);
    Route::get('admin/single-order/{id}', [OrderController::class, 'singleorder']);

    Route::get('admin/faq', [FaqController::class, 'index']);
    Route::post('admin/faq', [FaqController::class, 'store']);
    Route::get('admin/faq/edit/{slug}', [FaqController::class, 'edit']);
    Route::post('admin/faq/update', [FaqController::class, 'update']);
    Route::get('admin/faq/delete/{id}', [FaqController::class, 'destroy']);


    Route::get('admin/blogs', [BlogController::class, 'index']);

    Route::get('admin/contact', [ContactController::class, 'index']);
    Route::get('admin/contact/delete/{id}', [ContactController::class, 'destroy']);
});

Route::get('admin/profile', function () {
    return view('admin.profile');
});


Route::get('admin/profile/setting', function () {
    return view('admin.profile_setting');
});
