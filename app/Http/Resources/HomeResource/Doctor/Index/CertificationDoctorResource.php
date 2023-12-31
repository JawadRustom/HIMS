<?php

namespace App\Http\Resources\HomeResource\Doctor\Index;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CertificationDoctorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
      return [
        'Name_Certifications'=>$this->certification?->CertificationName,
        'Donor_Certifications'=>$this->certification?->CertificationDonor,
      ];
    }
}
