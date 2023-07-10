<?php

namespace App\Http\Resources\AdminResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientsOperationResource extends JsonResource
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
          'FirstName'=>$this->patient?->user?->FirstName,
          'DoctorID'=>$this->DoctorID,
          'DoctorName'=>$this->employee?->user?->FirstName,
          'AnesthesiologistID'=>$this->AnesthesiologistID,
          'AnesthesiologistName'=>$this->employee?->user?->FirstName,
          'OperationID'=>$this->OperationID,
          'OperationName'=>$this->operation?->OperationName,
          'OperationDate'=>$this->OperationDate,
          'DoctorCommission'=>$this->DoctorCommission,
        ];
    }
}
    