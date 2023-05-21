<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Middleware\Authentication\GuestMiddleware;

Route::middleware(GuestMiddleware::class)->group(function(){
  Route::post('/login',[AuthenticationController::class,'login']);
  Route::post('/LoginAdmin',[AuthenticationController::class,'LoginAdmin']);
  Route::post('/register',[AuthenticationController::class,'register']);
});

Route::middleware('auth:sanctum')->post('/logout',[AuthenticationController::class,'logout']);

//Route::middleware(GuestMiddleware::class)->post('/login',[AuthenticationController::class,'login']);
//Route::post('/LoginAdmin',[AuthenticationController::class,'LoginAdmin']);
//Route::post('/register',[AuthenticationController::class,'register']);
//Route::post('/logout',[AuthenticationController::class,'logout']);