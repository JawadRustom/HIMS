<?php

use App\Http\Controllers\Api\AdminController\AnalysiController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/Analysis',AnalysiController::class);