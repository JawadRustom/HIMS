<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Post extends Model
{
  use HasFactory;

  protected $fillable = [
    'Title',
    'Text',
    'PostType',
  ];

  protected $casts = [
    'id' => 'integer',
  ];
  public function photos()
  {
    return $this->morphMany(Photo::class, 'imageable');
  }
}
