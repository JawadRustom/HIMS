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
          'Doctor_ID' => $this->id,
          'type'=>$this->EmployeeType->Type,
          'doctor_name' => ['FirstName' => $this->user->FirstName, 'LastName' => $this->user->LastName],
          'doctor_speciality_and_donor_name' => CertificationDoctorResource::collection($this->certificationEmployee), //$this->certificationEmployee->certification->CertificationName,//Error This Can Return Many CertificationName
          'doctor experience' => $this->experiance_year,
          'doctor_city' => $this->user->City,
          'doctor_country' => $this->user->Country,
          'doctor_work_schedule'=>WorkScheduleResource::collection($this->workSchedule),
          //'CertificationDonor'=>$this->certificationEmployee->certification->CertificationDonor,This Right Or No
        ];
    }
}
