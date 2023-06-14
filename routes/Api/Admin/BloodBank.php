<?php

use App\Http\Controllers\Api\AdminController\BloodBankController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/BloodBank',BloodBankController::class);