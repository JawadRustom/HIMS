<?php

use App\Http\Controllers\Api\AdminController\EquipmentTypeController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/EquipmentType',EquipmentTypeController::class);