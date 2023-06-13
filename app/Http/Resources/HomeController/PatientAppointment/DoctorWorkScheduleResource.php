<?php

namespace App\Http\Resources\HomeController\PatientAppointment;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorWorkScheduleResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      'WorkDayName' => date('l', strtotime($this->WorkDayName)),
    ];
  }
}
