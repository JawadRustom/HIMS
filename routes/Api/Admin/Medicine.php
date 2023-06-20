<?php

use App\Http\Controllers\Api\AdminController\MedicineController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/Medicine',MedicineController::class);