<?php

use App\Http\Controllers\Api\Categories\CategoryController;
use App\Http\Controllers\Api\Categories\ParentCategoryController;
use App\Http\Controllers\Api\Categories\SubCategoryController;
use App\Http\Controllers\Api\Delivery\DeliveryController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::prefix('parent_category')->name('parent_category.')->group(function () {
    Route::get('/', [ParentCategoryController::class, 'index']);
    Route::post('/', [ParentCategoryController::class, 'store']);
    Route::put('/{parentCategory}', [ParentCategoryController::class, 'update']);
    Route::delete('/{parentCategory}', [ParentCategoryController::class, 'destroy']);
});

Route::prefix('category')->name('category.')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::post('/', [CategoryController::class, 'store']);
    Route::put('/{category}', [CategoryController::class, 'update']);
    Route::delete('/{category}', [CategoryController::class, 'destroy']);
});

Route::prefix('sub-category')->name('sub-category.')->group(function () {
    Route::get('/', [SubCategoryController::class, 'index']);
    Route::post('/', [SubCategoryController::class, 'store']);
    Route::put('/{subCategory}', [SubCategoryController::class, 'update']);
    Route::delete('/{subCategory}', [SubCategoryController::class, 'destroy']);
});

Route::prefix('delivery')->name('delivery.')->group(function () {
    Route::get('/', [DeliveryController::class, 'index']);
    Route::post('/', [DeliveryController::class, 'store']);
    Route::put('/{delivery}', [DeliveryController::class, 'update']);
    Route::delete('/{delivery}', [DeliveryController::class, 'destroy']);
});

Route::prefix('product')->name('products.')->group(function (){
   Route::get('/',[ProductController::class, 'index']);
   Route::post('/',[ProductController::class, 'store']);
   Route::put('/{product}',[ProductController::class, 'update']);
   Route::delete('/{product}',[ProductController::class, 'destroy']);
});
