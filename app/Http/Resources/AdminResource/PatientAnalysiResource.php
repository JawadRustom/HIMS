<?php

namespace App\Http\Resources\AdminResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientAnalysiResource extends JsonResource
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
          'AnalysisID'=>$this->AnalysisID,
          'AnalysisName'=>$this->analysi->AnalysisName,
          'AnalysisDate'=>$this->AnalysisDate,
          'AnalysisRatio'=>$this->AnalysisRatio,
          'AnalysisResult'=>$this->AnalysisResult,
        ];
    }
}
    