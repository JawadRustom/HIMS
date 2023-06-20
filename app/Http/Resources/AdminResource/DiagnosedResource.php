<?php

namespace App\Http\Resources\AdminResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiagnosedResource extends JsonResource
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
          'DoctoriD'=>$this->DoctoriD,
          'PatientID'=>$this->PatientID,
          'DiseaseID'=>$this->DiseaseID,
          'Details'=>$this->Details,
          'PatientAppointmentID'=>$this->PatientAppointmentID,
        ];
    }
}
    