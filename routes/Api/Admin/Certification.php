<?php

use App\Http\Controllers\Api\AdminController\CertificationController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/Certification',CertificationController::class);