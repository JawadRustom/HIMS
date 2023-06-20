<?php

use App\Http\Controllers\Api\AdminController\CertificationEmployeeController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/CertificationEmployee',CertificationEmployeeController::class);