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
        'NickName' =>$this->NickName,
        'FirstName'=>$this->FirstName,
        'LastName'=>$this->LastName,
        'email'=>$this->email,
        'password'=>$this->password,
        'PhoneNumber'=>$this->PhoneNumber,
        'Country'=>$this->Country,
        'City'=>$this->City,
        'ProfileImage'=>$this->ProfileImage,
        'icon'=>$this->icon,
        'UserTypeId'=>4,
        ];
    }
}
