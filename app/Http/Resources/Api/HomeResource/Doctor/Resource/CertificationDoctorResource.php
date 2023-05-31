<?php

namespace App\Http\Resources\Api\HomeResource\Doctor\Resource;

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
          'Name Certifications'=>$this->certification->CertificationName,
          'Doctor Certifications'=>$this->certification->CertificationDonor,
        ];
    }
}
