<?php

use App\Http\Controllers\Api\AdminController\AnalysiController;
use App\Http\Controllers\Api\AdminController\DiagnosedController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/Diagnosed',DiagnosedController::class);