<?php

namespace App\Http\Resources\PatientResource\Dashbord;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientTestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'FirstName'=>$this->FirstName??null,
          'LastName'=>$this->LastName??null,
          'AnalysisResult'=>PatientAnalysisResource::collection($this->Patient->patientAnalysi)??null,
        ];
    }
}
