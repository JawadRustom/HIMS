<?php

use App\Http\Controllers\Api\HomeController\PostController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/Post',PostController::class)->only(['index','show']);