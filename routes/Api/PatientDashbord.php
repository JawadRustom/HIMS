<?php

use App\Http\Controllers\Api\PatientController\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/Patient/Dashbord', [PatientController::class, 'Dashbord']);
