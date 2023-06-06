<?php

namespace App\Http\Resources\PatientResource\Dashbord;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientAppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
      return [
        'OperationName'=>$this->operation->OperationName,
        'OperationDate'=>$this->employee->user->FirstName,
      ];
    }
}
