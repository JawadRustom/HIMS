<?php

namespace App\Http\Resources\AdminResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkScheduleResource extends JsonResource
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
          'FirstName'=>$this->employee->user->FirstName,
          'RoomID'=>$this->RoomID,
          'RoomType'=>$this->room->RoomType,
          'FromHour'=>$this->FromHour,
          'ToHour'=>$this->ToHour,
          'WorkDayName'=>$this->WorkDayName,
        ];
    }
}
    