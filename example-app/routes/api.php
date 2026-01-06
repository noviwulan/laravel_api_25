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

Route::post('/category-product', [CategoryProductController::class, 'store']);
Route::get('/category-product', [CategoryProductController::class, 'index']);
Route::get('/category-product/{id}', [CategoryProductController::class, 'show']);
Route::put('/category-product/{id}', [CategoryProductController::class, 'update']);
Route::delete('/category-product/{id}', [CategoryProductController::class, 'destroy']);




Route::get('/v1/product-variant', [ProductVariantController::class, 'index']);
Route::post('/v1/product-variant', [ProductVariantController::class, 'store']);
Route::get('/v1/product-variant/{id}', [ProductVariantController::class, 'show']);
Route::put('/v1/product-variant/{id}', [ProductVariantController::class, 'update']);
Route::delete('/v1/product-variant/{id}', [ProductVariantController::class, 'destroy']);
