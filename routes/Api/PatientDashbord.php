<?php

use App\Http\Controllers\Api\PatientController\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/Patient/Dashbord', [PatientController::class, 'Dashbord']);
Route::get('/Patient/PatientTest', [PatientController::class, 'PatientTest']);
Route::get('/Patient/PatientAppointment', [PatientController::class, 'PatientAppointment']);
Route::get('/Patient/EditPatientProfile', [PatientController::class, 'EditPatientProfile']);
Route::get('/Patient/showPatientProfile', [PatientController::class, 'showPatientProfile']);

