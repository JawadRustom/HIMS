<?php

use App\Http\Controllers\Api\AdminController\OperationController;
use App\Http\Controllers\Api\AdminController\PatientController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/Patient',PatientController::class);