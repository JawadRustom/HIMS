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

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function bloodBanks(): HasOne
    {
        return $this->hasOne(BloodBanks::class);
    }

    public function roomContents(): HasMany
    {
        return $this->hasMany(RoomContents::class);
    }

    public function workSchedules(): HasMany
    {
        return $this->hasMany(WorkSchedules::class);
    }
}
