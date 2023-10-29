<?php

use App\Http\Controllers\Api\Delivery\DeliveryController;
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


Route::prefix('delivery')->name('delivery.')->group(function (){
   Route::get('/',[DeliveryController::class, 'index']);
   Route::post('/',[DeliveryController::class, 'store']);
   Route::put('/{delivery}',[DeliveryController::class, 'update']);
   Route::delete('/{delivery}',[DeliveryController::class, 'destroy']);
});
