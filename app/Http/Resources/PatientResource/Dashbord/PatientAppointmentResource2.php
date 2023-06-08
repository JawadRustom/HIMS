<?php

namespace App\Http\Resources\PatientResource\Dashbord;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientAppointmentResource2 extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'FirstName'=>$this->FirstName,
          'LastName'=>$this->LastName,
          'patient_appointment'=>PatientAppointmentResource::collection($this->Patient->patientAppointment),
        ];
    }
}
