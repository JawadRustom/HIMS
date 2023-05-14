<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
      'imageable_id',
      'imageable_type',
      'filename',
  ];
  public function imageable():MorphTo
  {
    return $this->morphTo();
  }
}
