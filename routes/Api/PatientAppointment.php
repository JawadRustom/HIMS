<?php

use App\Http\Controllers\Api\HomeController\PatientAppointmentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'userType:patient'])->group(function(){
  Route::apiResource('/PatientAppointment',PatientAppointmentController::class)->only(['store']);
  Route::get('/PatientAppointment/DoctorOfDepartment/{id}',[PatientAppointmentController::class,'doctorOfDepartment']);
});

