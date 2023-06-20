<?php

use App\Http\Controllers\Api\AdminController\ClinicController;
use App\Http\Controllers\Api\AdminController\DeathController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/Death',DeathController::class);