<?php

namespace App\Http\Resources\PatientResource\Dashbord;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientAnalysisResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'analysis_name'=>$this->analysi?->AnalysisName,
          'analysis_date'=>$this->AnalysisDate,
          'analysis_ratio'=>$this->AnalysisRatio,
          'analysis_result'=>$this->AnalysisResult,
        ];
    }
}
