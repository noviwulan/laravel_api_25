<?php

use App\Http\Controllers\Api\CategoryProductController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductVariantController;
// use App\Http\Controllers\ProductController;
use App\Http\Controllers\VendorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function(){
    Route::resource('category-product',CategoryProductController::class);
    Route::resource('product',ProductController::class);
    Route::resource('product-variant',ProductVariantController::class);
    Route::resource('vendor',VendorController::class);
});


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/prducts', [ProductController::class, 'index']);
Route::post('/prducts', [ProductController::class, 'store']);
Route::resource('vendors', VendorController::class);

Route::get('/Halo', function (){
    return 'Halo, Laravel';
});
