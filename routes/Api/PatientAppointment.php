<?php

use App\Http\Controllers\Api\HomeController\PatientAppointmentController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'userType:patient'])->group(function () {
  require_once 'PatientDashbord.php';
  Route::apiResource('/PatientAppointment', PatientAppointmentController::class)->only(['store']);
  Route::get('/PatientAppointment/DoctorOfDepartment/{id}', [PatientAppointmentController::class, 'doctorOfDepartment']);
  Route::get('/PatientAppointment/doctorOfClinic/{id}', [PatientAppointmentController::class, 'doctorOfClinic']);
  Route::get('/PatientAppointment/avalible-appointment/{id}', [PatientAppointmentController::class, 'AvalibleAppointment']);
  Route::get('/PatientAppointment/clinic', [PatientAppointmentController::class, 'clinic']);
  Route::get('/PatientAppointment/doctorWorkSchedule/{id}', [PatientAppointmentController::class, 'doctorWorkSchedule']);
});
