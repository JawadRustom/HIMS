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
          'id'=>$this->id,
          'NickName'=>$this->NickName,
          'FirstName'=>$this->FirstName,
          'LastName'=>$this->LastName,
          'patient_id'=>$this->Patient->id,
          'ProfileImage'=>$this->ProfileImage,
          //'NationalNumber'=>$this->Patient->NationalNumber,
          //'Gender'=>$this->Patient->Gender,
          //'BirthDate'=>$this->Patient->BirthDate,
          //'PatientLength'=>$this->Patient->PatientLength,
          //'PatientWeight'=>$this->Patient->PatientWeight,
          'email'=>$this->email,
          'PhoneNumber'=>$this->PhoneNumber,
          //'patient_operation'=>PatientOperationResource::collection($this->Patient->patientsOperation),
          //'patient_appointment'=>PatientAppointmentResource::collection($this->Patient->patientAppointment),
        ];
    }
}
