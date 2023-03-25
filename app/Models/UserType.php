<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'UserType',
    ];
    public function User()
    {
        return $this->hasMany(User::class,'UserTypeId','id');
    }
}
