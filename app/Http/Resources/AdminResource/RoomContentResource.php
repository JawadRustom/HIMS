<?php

namespace App\Http\Resources\AdminResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomContentResource extends JsonResource
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
          'EquipmentID'=>$this->EquipmentID,
          'Equipment_Type_Name'=>$this->equipment?->EquipmentType?->Equipment_Type_Name,
          'RoomID'=>$this->RoomID,
          'RoomType'=>$this->room?->RoomType,
        ];
    }
}
    