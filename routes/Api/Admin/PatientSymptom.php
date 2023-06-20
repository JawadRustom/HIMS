<?php

use App\Http\Controllers\Api\AdminController\PatientSymptomController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/PatientSymptom',PatientSymptomController::class);