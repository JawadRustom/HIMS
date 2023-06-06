<?php

namespace App\Http\Resources\PatientResource\Dashbord;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'user_id'=>$this->id,
          'nick_name'=>$this->NickName,
          'first_name'=>$this->FirstName,
          'last_name'=>$this->LastName,
          'patient_id'=>$this->Patient->id,
          'profile_image'=>$this->ProfileImage,
          'national_number'=>$this->Patient->NationalNumber,
          'gender'=>$this->Patient->Gender,
          'birth_date'=>$this->Patient->BirthDate,
          'patient_length'=>$this->Patient->PatientLength,
          'patient_weight'=>$this->Patient->PatientWeight,
          'email'=>$this->email,
          'phone_number'=>$this->PhoneNumber,
          'patient_operation'=>PatientOperationResource::collection($this->Patient->patientsOperation),
          'patient_appointment'=>PatientAppointmentResource::collection($this->Patient->patientAppointment),
        ];
    }
}
