<?php

namespace App\Http\Resources\AdminResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
        'EmployeeType'=>$this->EmployeeType->Type,
        'NationalNumber'=>$this->NationalNumber,
        'DepartmentID'=>$this->DepartmentID,
        'DepartmentName'=>$this->department->DepartmentName,
        'FirstName'=>$this->user->FirstName,
        'LastName'=>$this->user->LastName,
        'email'=>$this->user->email,
        'password'=>$this->user->password,
        'Address'=>$this->Address,
        'HireDate'=>$this->HireDate,
        'Gender'=>$this->Gender,
        'BirthDate'=>$this->BirthDate,
        'Salary'=>$this->Salary,
        'ManagerID'=>$this->ManagerID,
        ];
    }
}
    