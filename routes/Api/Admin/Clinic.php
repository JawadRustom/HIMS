<?php

use App\Http\Controllers\Api\AdminController\ClinicController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/Clinic',ClinicController::class);