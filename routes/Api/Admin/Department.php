<?php

use App\Http\Controllers\Api\AdminController\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/Department',DepartmentController::class)->except(['update']);
Route::post('/Department/{Department}',[DepartmentController::class, 'update']);