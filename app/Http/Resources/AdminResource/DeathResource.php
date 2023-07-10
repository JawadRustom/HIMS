<?php

namespace App\Http\Resources\AdminResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeathResource extends JsonResource
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
          'PatientID'=>$this->patient->user?->FirstName,
          'DeathDate'=>$this->DeathDate,
        ];
    }
}
    