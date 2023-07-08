<?php

namespace App\Http\Resources\PatientResource\Dashbord;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowPatientDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
        'NickName' =>$this->NickName??null,
        'FirstName'=>$this->FirstName??null,
        'LastName'=>$this->LastName??null,
        'email'=>$this->email??null,
        'password'=>$this->password??null,
        'PhoneNumber'=>$this->PhoneNumber??null,
        'Country'=>$this->Country??null,
        'City'=>$this->City??null,
        'ProfileImage'=>$this->ProfileImage??null,
        'icon'=>$this->icon??null,
        'UserTypeId'=>4,
        ];
    }
}
