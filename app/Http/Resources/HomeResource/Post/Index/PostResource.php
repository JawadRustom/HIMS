<?php

namespace App\Http\Resources\HomeResource\Post\Index;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'post_id'=>$this->id,
          'post_title'=>$this->Title,
          'post_text'=>$this->Text,
          'post_type'=>$this->PostType,
          'Image'=>$this->photo?->filename,
        ];
    }
}
