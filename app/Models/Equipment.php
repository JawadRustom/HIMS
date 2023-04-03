<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipment extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'EquipmentTypeID',
        'Details',
        'CompanyName',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'EquipmentTypeID' => 'integer',
    ];

    public function equipmentTypes(): BelongsTo
    {
        return $this->belongsTo(EquipmentTypes::class);
    }

    public function equipmentTypeID(): BelongsTo
    {
        return $this->belongsTo(EquipmentType::class);
    }

    public function equipmentBills(): HasMany
    {
        return $this->hasMany(EquipmentBill::class);
    }

    public function roomContents(): HasMany
    {
        return $this->hasMany(RoomContent::class);
    }
}
