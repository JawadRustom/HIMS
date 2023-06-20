<?php

use App\Http\Controllers\Api\AdminController\AnalysiController;
use App\Http\Controllers\Api\AdminController\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/Employee',EmployeeController::class);