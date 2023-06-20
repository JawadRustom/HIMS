<?php

use App\Http\Controllers\Api\AdminController\UserController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/User',UserController::class);