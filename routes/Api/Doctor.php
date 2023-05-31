<?php

use App\Http\Controllers\Api\HomeController\DoctorController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/Doctor',DoctorController::class)->except(['store','update','destroy']);
//Route::apiResource('/Doctor',DoctorController::class)->only(['index','show']);