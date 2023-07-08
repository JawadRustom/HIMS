<?php

namespace App\Http\Resources\HomeResource\Doctor\Index;

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
        //return parent::toArray($request);
        return [
        'Doctor_ID' => $this->id,
        'type'=>$this->EmployeeType?->Type,
        'Doctor_Name' => ['FirstName' => $this->user?->FirstName, 'LastName' => $this->user?->LastName],
        'Doctor_Speciality_And_Donor_Name' => CertificationDoctorResource::collection($this->certificationEmployee), //$this->certificationEmployee->certification->CertificationName,//Error This Can Return Many CertificationName
        'doctor_experience' => $this->experiance_year,
        'Doctor_Image' => $this->user?->ProfileImage,
        'Doctor_City' => $this->user?->City,
        'Doctor_Country' => $this->user?->Country,
        //'CertificationDonor'=>$this->certificationEmployee->certification->CertificationDonor,This Right Or No
      ];
    }
}
