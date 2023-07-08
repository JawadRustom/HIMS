<?php

namespace App\Http\Resources\AdminResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientMedicineResource extends JsonResource
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
          'MedicineID'=>$this->MedicineID,
          'MedicineName'=>$this->medicine?->MedicineName,
          'DiagnosedID'=>$this->DiagnosedID,
          'MedicineCaliber'=>$this->MedicineCaliber,
          'DosagePerDay'=>$this->DosagePerDay,
          'DaysCount'=>$this->DaysCount,
        ];
    }
}
    