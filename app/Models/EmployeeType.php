<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmployeeType extends Model
{
  protected $fillable = [
    'Type',
  ];

    use HasFactory;
    public function Employee(): HasMany
    {
        return $this->HasMany(employee::class,'EmployeeTypeId','id');
    }
}
