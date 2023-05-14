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
        'PostDate',
    ];

    protected $casts = [
        'id' => 'integer',
        'PostDate' => 'date',
    ];
    public function photos()
    {
      return $this->morphMany(related: 'App\Photo',name:'imageable');
    }
}
