<?php

use App\Http\Controllers\Api\AdminController\DiseaseController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/Disease',DiseaseController::class);