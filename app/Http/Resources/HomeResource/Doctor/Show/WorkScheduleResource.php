<?php

namespace App\Http\Resources\HomeResource\Doctor\Show;

use Carbon\Carbon;
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
          'from_hour'=>$this->FromHour,
          //'from_hour'=>Carbon::createFromFormat('m/d/Y/h', $this->FromHour)->format('Y'),
          'to_hour'=>$this->ToHour,
          'day_name'=>$this->WorkDayName,
        ];
    }
}
