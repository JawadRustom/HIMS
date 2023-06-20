<?php

use App\Http\Controllers\Api\AdminController\PatientAnalysiController;
use App\Http\Controllers\Api\AdminController\PatientAppointmentController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/PatientAppointment',PatientAppointmentController::class);