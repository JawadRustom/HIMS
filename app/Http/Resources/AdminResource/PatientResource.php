<?php

namespace App\Http\Resources\AdminResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
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
          'user_id'=>$this->user_id,
          'FirstName'=>$this->user?->FirstName,
          'LastName'=>$this->user?->LastName,
          'email'=>$this->user?->email,
          'PhoneNumber'=>$this->user?->PhoneNumber,
          'NationalNumber'=>$this->NationalNumber,
          'PatientStatus'=>$this->PatientStatus,
          'Gender'=>$this->Gender,
          'BirthDate'=>$this->BirthDate,
          'PatientLength'=>$this->PatientLength,
          'PatientWeight'=>$this->PatientWeight,
        ];
    }
}






