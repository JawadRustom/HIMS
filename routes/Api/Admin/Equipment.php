<?php

use App\Http\Controllers\Api\AdminController\EmployeeTypeController;
use App\Http\Controllers\Api\AdminController\EquipmentController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/Equipment',EquipmentController::class);