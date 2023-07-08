<?php

namespace App\Http\Resources\AdminResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicineBillResource extends JsonResource
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
          'MedicineID'=>$this->MedicineID,
          'MedicineName'=>$this->medicine?->MedicineName,
          'EmployeeID'=>$this->EmployeeID,
          'FirstName'=>$this->employee?->user->FirstName,
          'BillDate'=>$this->BillDate,
          'Quantity'=>$this->Quantity,
          'BuyPrice'=>$this->BuyPrice,
          'SalePrice'=>$this->SalePrice,
        ];
    }
}





