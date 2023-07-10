<?php

namespace App\Http\Controllers\Api\HomeController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\HomeRequest\PatientAppointmentRequest;
use App\Http\Resources\HomeController\PatientAppointment\ClinicResource;
use App\Http\Resources\HomeController\PatientAppointment\DoctorOfClinicResource;
use App\Http\Resources\HomeController\PatientAppointment\DoctorOfDepartmentResource;
use App\Http\Resources\HomeController\PatientAppointment\DoctorWorkScheduleResource;
use App\Http\Resources\test11;
use App\Models\Clinic;
use App\Models\Department;
use App\Models\Employee;
use App\Models\PatientAppointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

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
  /**
   * See doctors from one department
   * @response 200 scenario="Success Process"{
    "data": [
        {
            "Doctor_ID": 84,
            "Doctor_Name": {
                "FirstName": "Mike",
                "LastName": "Bruen"
            }
        }
    ]
}
   * 
   * @response 404 scenario="This dotor not found"{
        "message": "not found"
        }
   * 
   * @response 401 scenario="This user not patient"{
    "message": "Unauthenticated."
}
   * 
   */
  public function doctorOfClinic(Clinic $id)
  {
    //return DoctorOfDepartmentResource::collection($id->employees()->whereHas('EmployeeType', fn ($query) => $query->where('Type', 'Doctor'))->get());
    return DoctorOfClinicResource::collection($id->department->employees()->whereHas('EmployeeType', fn ($query) => $query->where('Type', 'Doctor'))->get());
  }
  /**
   * See doctors from one department
   * @response 200 scenario="Success Process"{
    "available_appontement": [
        "10:00",
        "10:30",
        "11:30",
        "12:30",
        "01:00",
        "01:30",
        "02:00",
        "02:30",
        "03:00",
        "03:30",
        "04:00",
        "04:30",
        "05:00",
        "05:30",
        "06:00",
        "06:30",
        "07:00",
        "07:30",
        "08:00",
        "08:30",
        "09:00",
        "09:30",
        "10:00"
    ]
}
   * 
   * @response 401 scenario="This user not patient"{
    "message": "Unauthenticated."
}
   * 
   * 
   * @response 404 scenario="This doctor not found"{
        "message": "not found"
        }
   * @response 400 scenario="Validation errors"{
    "message": "Doctor is on holiday on that day"
    "message": "This Employee is Not Doctor"
}
   * 
   * 
       * * @queryparam perPage int 
       * To return limite data in single page.
       * Defaults value for variable '15'.
       * 
       * * @queryparam date date 
       * To return AvalibleAppointment in this date.
   * 
   */
  public function AvalibleAppointment(Employee $id, Request $request)
  {
    // $work=$id->workSchedule->WorkDayName;
    // if($work != $request->appointmentDate)
    // {
    //   return response('This doctor not work in this date',400);
    // }


    // $workSchedule = $id->workSchedule->WorkDayName;
    // $found = false;
    // foreach ($workSchedule as $work) {
    //     if ($work == $request->appointmentDate) {
    //         $found = true;
    //         break;
    //     }
    // }

    // if (!$found) {
    //     return response('This doctor does not work on this date', 400);
    // }

    if ($id->EmployeeTypeId != 1) {
      return response(['message' => 'This Employee is Not Doctor'], 400);
    }
    if (!$id->workSchedule->contains(fn ($value, $key) => $value->WorkDayName == date('l', strtotime($request->date)))) {
      return response([
        'message' => 'Doctor is on holiday on that day',
      ], 400);
    }
    // if (!$id->workSchedule->contains(fn ($value, $key) => date('H:i', strtotime($value->FromHour)) <= date('H:i', strtotime($request->date)) && date('H:i', strtotime($value->ToHour)) >= date('H:i', strtotime($request->date)))) {
    //   return response([
    //     'message' => 'Doctor don\'t work on this time',
    //   ], 400);
    // }

    $startTime = strtotime('10:00 am');
    $endTime = strtotime('10:00 pm');
    $timeStep = 30 * 60; // 30 minutes in seconds

    $timeslots = range($startTime, $endTime, $timeStep);
    
    $unavailableAppointments = $id->PatientAppointment()->whereDate('AppointmentDate', date('Y-m-d',strtotime($request->date)))->get()->map(fn ($appointment) => Carbon::parse($appointment->AppointmentDate)->format('h:i'));
    $availableAppointment = collect($timeslots)->map(function ($timestamp) use ($unavailableAppointments) {
      $appointment = date('h:i', $timestamp);
      if (!$unavailableAppointments->contains($appointment)) {
        return date('h:i', $timestamp);
      }
    })->filter(fn ($item) => !empty($item));

    return response([
      'available_appontement' => $availableAppointment->values(),
    ]);
  }

    /**
   * See WorkSchedule of one Doctor
   * @response 200 scenario="Success Process"{
    "data": [
        {
            "WorkDayName": "Monday"
        },
        {
            "WorkDayName": "Tuesday"
        },
        {
            "WorkDayName": "Wednesday"
        }
    ]
}
   * 
   * @response 401 scenario="This user not patient"{
    "message": "Unauthenticated."
}
   * 
       * @response 404 scenario="This doctor not found"{
        "message": "not found"
        }
       * 
   * 
   */
  public function doctorWorkSchedule(Employee $id)
  {
    return DoctorWorkScheduleResource::orderBy('id', 'desc')->collection($id->workSchedule);
  }
    /**
   * See all clinic 
   * @response 200 scenario="Success Process"{
    "data": [
        {
            "Doctor_ID": 1,
            "ClinicsType": "nam"
        },
        {
            "Doctor_ID": 2,
            "ClinicsType": "tenetur"
        },
        {
            "Doctor_ID": 3,
            "ClinicsType": "quasi"
        },
        {
            "Doctor_ID": 4,
            "ClinicsType": "voluptate"
        },
        {
            "Doctor_ID": 5,
            "ClinicsType": "similique"
        },
        {
            "Doctor_ID": 6,
            "ClinicsType": "eum"
        },
        {
            "Doctor_ID": 7,
            "ClinicsType": "aliquam"
        },
        {
            "Doctor_ID": 8,
            "ClinicsType": "vel"
        },
        {
            "Doctor_ID": 9,
            "ClinicsType": "commodi"
        },
        {
            "Doctor_ID": 10,
            "ClinicsType": "quia"
        },
        {
            "Doctor_ID": 11,
            "ClinicsType": "hic"
        },
        {
            "Doctor_ID": 12,
            "ClinicsType": "illo"
        },
        {
            "Doctor_ID": 13,
            "ClinicsType": "corrupti"
        },
        {
            "Doctor_ID": 14,
            "ClinicsType": "nulla"
        },
        {
            "Doctor_ID": 15,
            "ClinicsType": "id"
        },
        {
            "Doctor_ID": 16,
            "ClinicsType": "asperiores"
        },
        {
            "Doctor_ID": 17,
            "ClinicsType": "corrupti"
        },
        {
            "Doctor_ID": 18,
            "ClinicsType": "est"
        },
        {
            "Doctor_ID": 19,
            "ClinicsType": "eum"
        },
        {
            "Doctor_ID": 20,
            "ClinicsType": "quae"
        },
        {
            "Doctor_ID": 21,
            "ClinicsType": "incidunt"
        },
        {
            "Doctor_ID": 22,
            "ClinicsType": "rerum"
        },
        {
            "Doctor_ID": 23,
            "ClinicsType": "voluptas"
        },
        {
            "Doctor_ID": 24,
            "ClinicsType": "quo"
        },
        {
            "Doctor_ID": 25,
            "ClinicsType": "iusto"
        },
        {
            "Doctor_ID": 26,
            "ClinicsType": "itaque"
        },
        {
            "Doctor_ID": 27,
            "ClinicsType": "magni"
        },
        {
            "Doctor_ID": 28,
            "ClinicsType": "perferendis"
        },
        {
            "Doctor_ID": 29,
            "ClinicsType": "eaque"
        },
        {
            "Doctor_ID": 30,
            "ClinicsType": "fugiat"
        },
        {
            "Doctor_ID": 31,
            "ClinicsType": "ea"
        },
        {
            "Doctor_ID": 32,
            "ClinicsType": "rerum"
        },
        {
            "Doctor_ID": 33,
            "ClinicsType": "quia"
        },
        {
            "Doctor_ID": 34,
            "ClinicsType": "commodi"
        },
        {
            "Doctor_ID": 35,
            "ClinicsType": "id"
        },
        {
            "Doctor_ID": 36,
            "ClinicsType": "atque"
        },
        {
            "Doctor_ID": 37,
            "ClinicsType": "ut"
        },
        {
            "Doctor_ID": 38,
            "ClinicsType": "non"
        },
        {
            "Doctor_ID": 39,
            "ClinicsType": "quam"
        },
        {
            "Doctor_ID": 40,
            "ClinicsType": "ut"
        },
        {
            "Doctor_ID": 41,
            "ClinicsType": "Eyes"
        }
    ]
}
   * 
   * @response 401 scenario="This user not patient"{
    "message": "Unauthenticated."
}
   * 
       * @response 404 scenario="This BloodBank not found"{
        "message": "not found"
        }
       * 
   * 
   */
  public function clinic(Request $request)
  {
    return ClinicResource::orderBy('id', 'desc')->collection(Clinic::All());
  }
}
