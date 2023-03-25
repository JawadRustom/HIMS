<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomContent extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'EquipmentID',
        'RoomID',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'EquipmentID' => 'integer',
        'RoomID' => 'integer',
    ];

    public function equipments(): BelongsTo
    {
        return $this->belongsTo(Equipments::class);
    }

    public function rooms(): BelongsTo
    {
        return $this->belongsTo(Rooms::class);
    }

    public function equipmentID(): BelongsTo
    {
        return $this->belongsTo(Equipment::class);
    }

    public function roomID(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
