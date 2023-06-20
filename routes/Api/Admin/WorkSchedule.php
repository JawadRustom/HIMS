<?php

use App\Http\Controllers\Api\AdminController\WorkScheduleController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/WorkSchedule',WorkScheduleController::class);