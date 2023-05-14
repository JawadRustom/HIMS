<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'DepartmentName',
        'Description',
        'ManagerID',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function employee(): HasOne
    {
        return $this->hasOne(Employee::class);
    }

    public function clinic(): HasMany
    {
        return $this->hasMany(Clinic::class);
    }

    public function ManagerID(): BelongsTo
    {
        return $this->BelongsTo(Employee::class,'ManagerID','id','HasOne');
    }
    public function photos()
    {
      return $this->morphMany(related: 'App\Photo',name:'imageable');
    }
}
