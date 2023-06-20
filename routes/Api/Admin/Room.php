<?php

use App\Http\Controllers\Api\AdminController\RoomController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/Room',RoomController::class);