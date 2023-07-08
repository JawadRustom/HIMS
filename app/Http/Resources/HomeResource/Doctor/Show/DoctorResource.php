<?php

namespace App\Http\Resources\HomeResource\Doctor\Show;

use App\Http\Resources\HomeResource\Doctor\Index\CertificationDoctorResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'Doctor_ID' => $this->id??null,
          //'type'=>$this->EmployeeType->Type,
          'doctor_name' => ['FirstName' => $this->user->FirstName, 'LastName' => $this->user->LastName]??null,
          'doctor_speciality_and_donor_name' => CertificationDoctorResource::collection($this->certificationEmployee)??null, //$this->certificationEmployee->certification->CertificationName,//Error This Can Return Many CertificationName
          'doctor_experience' => $this->experiance_year??null,
          'doctor_city' => $this->user->City??null,
          'doctor_country' => $this->user->Country??null,
          'doctor_work_schedule'=>WorkScheduleResource::collection($this->workSchedule)??null,
          //'CertificationDonor'=>$this->certificationEmployee->certification->CertificationDonor,This Right Or No
        ];
    }
}
