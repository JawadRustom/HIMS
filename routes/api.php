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
  require_once 'Api/Admin/Certification.php';
  require_once 'Api/Admin/CertificationEmployee.php';
  require_once 'Api/Admin/Clinic.php';
  require_once 'Api/Admin/Death.php';
  require_once 'Api/Admin/Department.php';
  require_once 'Api/Admin/Diagnosed.php';
  require_once 'Api/Admin/Disease.php';
  require_once 'Api/Admin/Employee.php';
  require_once 'Api/Admin/EmployeeType.php';
  require_once 'Api/Admin/Equipment.php';
  require_once 'Api/Admin/EquipmentBill.php';
  require_once 'Api/Admin/EquipmentType.php';
  require_once 'Api/Admin/Medicine.php';
  require_once 'Api/Admin/MedicineBill.php';
  require_once 'Api/Admin/Operation.php';
  require_once 'Api/Admin/Patient.php';
  require_once 'Api/Admin/PatientAnalysi.php';
  require_once 'Api/Admin/PatientAppointment.php';
  require_once 'Api/Admin/PatientMedicine.php';
  require_once 'Api/Admin/PatientsOperation.php';
  require_once 'Api/Admin/PatientSymptom.php';
  require_once 'Api/Admin/Room.php';
  require_once 'Api/Admin/RoomContent.php';
  require_once 'Api/Admin/Symptom.php';
  require_once 'Api/Admin/User.php';
  require_once 'Api/Admin/WorkSchedule.php';
});