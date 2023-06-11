<?php

namespace App\Http\Controllers\Api\PatientController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Authentication\RegisterRequest;
use App\Http\Requests\Api\PatietnRequest\EditPatientDetailsRequest;
use App\Http\Resources\PatientResource\Dashbord\PatientAppointmentResource2;
use App\Http\Resources\PatientResource\Dashbord\PatientResource;
use App\Http\Resources\PatientResource\Dashbord\PatientTestResource;
use App\Http\Resources\PatientResource\Dashbord\ShowPatientDetailsResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
          /**
   * Patient Profile Details
   * 
   * @response 402 scenario="Success Process"{
   * }
   * 
   * 
   * @response 401 scenario="This user not patient"{
    "message": "Unauthenticated."
}
   */
    public function EditPatientProfile(EditPatientDetailsRequest $Request)
    {
      $user = auth()->user();
      $user->update([
        'NickName' =>$Request->NickName??auth()->user()->NickName,
        'FirstName'=>$Request->FirstName??auth()->user()->FirstName,
        'LastName'=>$Request->LastName??auth()->user()->LastName,
        'email'=>$Request->email??auth()->user()->email,
        'password'=>Hash::make($Request->password)??auth()->user()->password,
        'PhoneNumber'=>$Request->PhoneNumber??auth()->user()->PhoneNumber,
        'Country'=>$Request->Country??auth()->user()->Country,
        'City'=>$Request->City??auth()->user()->City,
        'ProfileImage'=>$Request->file('ProfileImage')?->store('pic')??auth()->user()->ProfileImage,
        'icon'=>$Request->file('icon')?->store('icon')??auth()->user()->icon,
        'UserTypeId'=>3,
      ]);
      return response()->noContent();
    }
    /**
   * Patient Profile Details
   * 
   * @response scenario="Success Process"{
  "data": {
      "NickName": "ahmad",
      "FirstName": "Mario",
      "LastName": "Schuster",
      "email": "joannie03@example.com",
      "password": "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
      "PhoneNumber": "1-623-694-9795",
      "Country": null,
      "City": null,
      "ProfileImage": "http://schulist.org/saepe-quae-excepturi-tenetur-quaerat-et",
      "icon": null,
      "UserTypeId": 4
  }
}
   * 
   * 
   * 
   * @response 401 scenario="This user not patient"{
    "message": "Unauthenticated."
}
   */
    public function showPatientProfile()
    {
      $user = auth()->user();
      return new ShowPatientDetailsResource($user);
    }
}