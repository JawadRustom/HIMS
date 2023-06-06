<?php

use App\Http\Controllers\Api\HomeController\PatientAppointmentController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/PatientAppointment',PatientAppointmentController::class)->only(['store']);