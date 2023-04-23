<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
