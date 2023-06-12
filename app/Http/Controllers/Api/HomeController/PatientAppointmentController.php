<?php

namespace App\Http\Controllers\Api\HomeController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\HomeRequest\PatientAppointmentRequest;
use App\Http\Resources\HomeController\PatientAppointment\ClinicResource;
use App\Http\Resources\HomeController\PatientAppointment\DoctorOfClinicResource;
use App\Http\Resources\HomeController\PatientAppointment\DoctorOfDepartmentResource;
use App\Models\Clinic;
use App\Models\Department;
use App\Models\Employee;
use App\Models\PatientAppointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * @group PatientAppointment
 * 
 * This Api For PatientAppointment
 */
class PatientAppointmentController extends Controller
{
  /**
   * Create PatientAppointment
   * 
   * @response 204 scenario="Create Appointment Success"{
   * }
   * @response 422 scenario="Validation errors"{
   "message": "The selected patient i d is invalid. (and 3 more errors)",
   "errors": {
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
   * @response 401 scenario="This user not patient"{
    "message": "Unauthenticated."
}
   */
  public function store(PatientAppointmentRequest $Request)
  {
    $patientAppointment = PatientAppointment::create([
      'PatientID' => auth()->user()->Patient->id,
      'ClinicID' => $Request->ClinicID,
      'doctor_id' => $Request->doctor_id,
      'AppointmentDate' => $Request->AppointmentDate,
    ]);
    return response()->noContent();
  }
  /**
   * See doctors from one department
   * @response 200 scenario="Success Process"{
    "data": [
        {
            "Doctor_ID": 74,
            "Doctor_Name": {
                "FirstName": "Cleo",
                "LastName": "Frami"
            }
        }
    ]
}
   * 
   * @response 401 scenario="This user not patient"{
    "message": "Unauthenticated."
}
   * 
   */
  public function doctorOfDepartment(Department $id)
  {
    return DoctorOfDepartmentResource::collection($id->employees()->whereHas('EmployeeType', fn ($query) => $query->where('Type', 'Doctor'))->get());
  }

  public function doctorOfClinic(Clinic $id)
  {
    //return DoctorOfDepartmentResource::collection($id->employees()->whereHas('EmployeeType', fn ($query) => $query->where('Type', 'Doctor'))->get());
    return DoctorOfClinicResource::collection($id->department->employees()->whereHas('EmployeeType', fn ($query) => $query->where('Type', 'Doctor'))->get());
  }

  public function clinic(Request $request)
  {
    //return DoctorOfDepartmentResource::collection($id->employees()->whereHas('EmployeeType', fn ($query) => $query->where('Type', 'Doctor'))->get());
    return ClinicResource::collection(Clinic::paginate($request->perPage ?? 15));
  }

  public function AvalibleAppointment(PatientAppointmentRequest $Request)
  {
    // $patientAppointment = PatientAppointment::create([
    //   'PatientID' => auth()->user()->Patient->id,
    //   'ClinicID' => $Request->ClinicID,
    //   'doctor_id' => $Request->doctor_id,
    //   'AppointmentDate' => $Request->AppointmentDate,
    // ]);
  }
}
