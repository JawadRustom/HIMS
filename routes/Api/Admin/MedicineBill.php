<?php

use App\Http\Controllers\Api\AdminController\MedicineBillController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/MedicineBill',MedicineBillController::class);