<?php

use App\Http\Controllers\Api\Categories\CategoryController;
use App\Http\Controllers\Api\Categories\ParentCategoryController;
use App\Http\Controllers\Api\Categories\SubCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::prefix("parent_category")->name("parent_category.")->group(function () {
    Route::get("/", [ParentCategoryController::class, "index"]);
    Route::post("/", [ParentCategoryController::class, "store"]);
    Route::put("/{parentCategory}", [ParentCategoryController::class, "update"]);
    Route::delete("/{parentCategory}", [ParentCategoryController::class, "destroy"]);
});

Route::prefix("category")->name("category.")->group(function () {
    Route::get("/", [CategoryController::class, "index"]);
    Route::post("/", [CategoryController::class, "store"]);
    Route::put("/{category}", [CategoryController::class, "update"]);
    Route::delete("/{category}", [CategoryController::class, "destroy"]);
});

Route::prefix("sub-category")->name("sub-category.")->group(function () {
    Route::get("/", [SubCategoryController::class, "index"]);
    Route::post("/", [SubCategoryController::class, "store"]);
    Route::put("/{subCategory}", [SubCategoryController::class, "update"]);
    Route::delete("/{subCategory}", [SubCategoryController::class, "destroy"]);
});
