<?php

use App\Http\Controllers\Api\AdminController\EmployeeTypeController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/EmployeeType',EmployeeTypeController::class);