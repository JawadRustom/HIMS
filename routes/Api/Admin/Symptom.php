<?php

use App\Http\Controllers\Api\AdminController\SymptomController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/Symptom',SymptomController::class);