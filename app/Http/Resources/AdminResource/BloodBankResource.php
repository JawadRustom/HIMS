<?php

namespace App\Http\Resources\AdminResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BloodBankResource extends JsonResource
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
          'name'=>$this->Name,
          'type'=>$this->Type,
          'quantity'=>$this->Quantity,
          'roomID'=>$this->RoomID,
        ];
    }
}
    