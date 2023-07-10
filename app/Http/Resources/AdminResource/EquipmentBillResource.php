<?php

namespace App\Http\Resources\AdminResource;

use App\Http\Resources\equipmentType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EquipmentBillResource extends JsonResource
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
          'EmployeeID'=>$this->EmployeeID,
          'FirstName'=>$this->employee?->user?->FirstName,
          'EquipmentID'=>$this->EquipmentID,
          'Equipment_Type_Name'=>$this->equipment?->equipmentType?->Equipment_Type_Name,
          'BillDate'=>$this->BillDate,
          'Quantity'=>$this->Quantity,
          'Price'=>$this->Price,
        ];
    }
}
    