<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
require_once 'Api/Authentication.php';
require_once 'Api/Doctor.php';
require_once 'Api/Post.php';
require_once 'Api/Department.php';
require_once 'Api/PatientAppointment.php';

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Admin Api Route
Route::middleware(['auth:sanctum', 'userType:admin'])->group(function(){
  require_once 'Api/Admin/Analysi.php';
  require_once 'Api/Admin/BloodBank.php';
});