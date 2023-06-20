<?php

use App\Http\Controllers\Api\AdminController\PatientsOperationController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/PatientsOperation',PatientsOperationController::class);