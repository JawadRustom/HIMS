<?php

use App\Http\Controllers\Api\AdminController\OperationController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/Operation',OperationController::class);