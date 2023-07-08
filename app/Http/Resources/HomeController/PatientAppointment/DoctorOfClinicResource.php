<?php

namespace App\Http\Resources\HomeController\PatientAppointment;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorOfClinicResource extends JsonResource
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
      'Doctor_Name' => ['FirstName' => $this->user?->FirstName, 'LastName' => $this->user?->LastName],
    ];
  }
}
