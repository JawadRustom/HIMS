<?php

use App\Http\Controllers\Api\AdminController\PatientAnalysiController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/PatientAnalysi',PatientAnalysiController::class);