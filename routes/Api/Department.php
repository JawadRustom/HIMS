<?php

use App\Http\Controllers\Api\HomeController\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/Department',DepartmentController::class)->only(['index','show']);