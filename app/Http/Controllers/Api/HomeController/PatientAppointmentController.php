<?php

namespace App\Http\Controllers\Api\HomeController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\HomeRequest\PatientAppointmentRequest;
use App\Http\Resources\HomeController\PatientAppointment\DoctorOfDepartmentResource;
use App\Models\Department;
use App\Models\Employee;
use App\Models\PatientAppointment;
use Illuminate\Http\Request;
/**
 * @group PatientAppointment
 * 
 * This Api For PatientAppointment
 */
class PatientAppointmentController extends Controller
{
  /**
   * Register
   * 
   * @response 204 scenario="Create Appointment Success"{
   * }
   * 
   * @response 422 scenario="Validation errors"{
    "message": "The selected patient i d is invalid. (and 3 more errors)",
    "errors": {
        "PatientID": [
            "The selected patient i d is invalid."
        ],
        "ClinicID": [
            "The clinic i d field is required."
        ],
        "doctor_id": [
            "The doctor id field is required."
        ],
        "AppointmentDate": [
            "The appointment date field must be a date after today."
        ]
    }
}
   */
    public function store(PatientAppointmentRequest $Request)
    {
      $patientAppointment=PatientAppointment::create([
        'PatientID' =>auth()->user()->Patient->id,
        'ClinicID'=>$Request->ClinicID,
        'doctor_id'=>$Request->doctor_id,
        'AppointmentDate'=>$Request->AppointmentDate,
      ]);
      return response()->noContent();
    } 

    public function doctorOfDepartment(Department $id)
    {
      return DoctorOfDepartmentResource::collection($id->employees()->whereHas('EmployeeType', fn ($query) => $query->where('Type', 'Doctor'))->get());
    }
}
