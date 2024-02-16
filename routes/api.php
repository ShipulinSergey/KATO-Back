<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\AuthController;
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
Route::post('/application-form', [ApplicationController::class, 'store']);

// Admin
Route::prefix('/admin')->group(function (){

    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:api')->group(function (){
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});


