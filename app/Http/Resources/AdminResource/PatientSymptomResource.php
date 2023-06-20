<?php

namespace App\Http\Resources\AdminResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientSymptomResource extends JsonResource
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
          'FirstName'=>$this->patient->user->FirstName,
          'SymptomID'=>$this->SymptomID,
          'SymptomsName'=>$this->symptom->SymptomsName,
          'SymptomDate'=>$this->SymptomDate,
          'Description'=>$this->Description,
        ];
    }
}
    