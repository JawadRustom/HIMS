<?php

namespace App\Http\Resources\AdminResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EquipmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'id'=>$this->EquipmentTypeID,
          'EquipmentTypeID'=>$this->EquipmentTypeID,
          'Equipment_Type_Name'=>$this->equipmentType?->Equipment_Type_Name,
          'Details'=>$this->Details,
          'CompanyName'=>$this->CompanyName,
        ];
    }
}
    