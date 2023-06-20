<?php

use App\Http\Controllers\Api\AdminController\RoomContentController;
use App\Http\Controllers\Api\AdminController\RoomController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/RoomContent',RoomContentController::class);