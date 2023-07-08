<?php

namespace App\Http\Resources\AdminResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentResource extends JsonResource
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
          'DepartmentName'=>$this->DepartmentName,
          'Description'=>$this->Description,
          'ManagerID'=>$this->ManagerID,
          'FirstName'=>$this->managerId?->user->FirstName,
          'Image'=>$this->photo?->filename,
        ];
    }
}