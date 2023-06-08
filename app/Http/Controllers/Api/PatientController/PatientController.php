<?php

namespace App\Http\Controllers\Api\PatientController;

use App\Http\Controllers\Controller;
use App\Http\Resources\PatientResource\Dashbord\PatientAppointmentResource2;
use App\Http\Resources\PatientResource\Dashbord\PatientResource;
use App\Http\Resources\PatientResource\Dashbord\PatientTestResource;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * @group PatientDashBoardController
 * 
 * This Api For PatientDashBoardController
 */
class PatientController extends Controller
{
  /**
   * DashBorad Details
   * 
   * @response scenario="Success Process"{
    "data": {
        "user_id": 98,
        "nick_name": "stark.johnson",
        "first_name": "Mario",
        "last_name": "Schuster",
        "patient_id": 90,
        "profile_image": "http://schulist.org/saepe-quae-excepturi-tenetur-quaerat-et",
        "national_number": "YE1Q3DDD2I",
        "gender": "female",
        "birth_date": "2010-12-26T22:00:00.000000Z",
        "patient_length": 194,
        "patient_weight": 64,
        "email": "joannie03@example.com",
        "phone_number": "1-623-694-9795",
        "patient_operation": [],
        "patient_appointment": [
            {
                "appointment_date": "2032-06-04T21:00:00.000000Z",
                "doctor_name": "Mariam"
            },
            {
                "appointment_date": "2032-06-04T21:00:00.000000Z",
                "doctor_name": "Mariam"
            }
        ]
    }
}
   * @response 401 scenario="This user not patient"{
    "message": "Unauthenticated."
}
   */
    public function Dashbord()
    {
      $user = auth()->user();
      $user->load('Patient');
      return new PatientResource($user);
    }
  /**
   * PatientTest Details
   * 
   * @response scenario="Success Process"{
    "data": {
        "FirstName": "Brandt",
        "LastName": "King",
        "AnalysisResult": [
            {
                "analysis_name": "ea",
                "analysis_date": "2008-05-10T21:00:00.000000Z",
                "analysis_ratio": "aliquam",
                "analysis_result": "et"
            }
        ]
    }
}
   * 
   * 
   * 
   * @response 401 scenario="This user not patient"{
    "message": "Unauthenticated."
}
   */
    public function PatientTest()
    {
      $user = auth()->user();
      $user->load('Patient');
      return new PatientTestResource($user);
    }

  /**
   * PatientAppointment Details
   * 
   * @response scenario="Success Process"{
    "data": {
        "FirstName": "Brandt",
        "LastName": "King",
        "patient_appointment": [
            {
                "appointment_date": "2032-06-04T21:00:00.000000Z",
                "doctor_name": "Mariam"
            },
            {
                "appointment_date": "2032-06-04T21:00:00.000000Z",
                "doctor_name": "Mariam"
            }
        ]
    }
}
   * 
   * 
   * 
   * @response 401 scenario="This user not patient"{
    "message": "Unauthenticated."
}
   */
    public function PatientAppointment()
    {
      $user = auth()->user();
      $user->load('Patient');
      return new PatientAppointmentResource2($user);
    }
}
