<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PublicController;
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
// Landing
Route::post('/send', [PublicController::class, 'sendMail']);
Route::post('/application', [ApplicationController::class, 'store']);
Route::post('/payment', [PaymentController::class, 'getPaymentCard']);

// Admin
Route::prefix('/admin')->group(function (){

    Route::post('/login', [AuthController::class, 'login']);
    Route::middleware('auth:api')->group(function (){
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::resource('/conference', ConferenceController::class);
    });
});


