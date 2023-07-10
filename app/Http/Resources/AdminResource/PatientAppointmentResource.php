<?php

namespace App\Http\Resources\AdminResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientAppointmentResource extends JsonResource
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
          'PatientID'=>$this->PatientID,
          'patientFirstName'=>$this->patient->user?->FirstName,
          'ClinicID'=>$this->ClinicID,
          'ClinicsType'=>$this->clinic?->ClinicsType,
          'doctor_id'=>$this->doctor_id,
          'employeeFirstName'=>$this->employee->user?->FirstName,
          'AppointmentDate'=>$this->AppointmentDate,
        ];
    }
}
    