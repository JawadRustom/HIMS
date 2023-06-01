<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'RoomType',
        'FloorNumber',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function bloodBank(): HasOne
    {
        return $this->hasOne(BloodBank::class,'RoomID','id');
    }

    public function roomContent(): HasMany
    {
        return $this->hasMany(RoomContent::class,'RoomID','id');
    }

    public function workSchedule(): HasMany
    {
        return $this->hasMany(WorkSchedule::class,'RoomID','id');
    }
}
