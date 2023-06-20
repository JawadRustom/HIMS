<?php

use App\Http\Controllers\Api\AdminController\PatientMedicineController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/PatientMedicine',PatientMedicineController::class);