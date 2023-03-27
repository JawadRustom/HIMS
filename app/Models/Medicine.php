<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicine extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'MedicineName',
        'MedicineQuantity',
        'MedicinePrice',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function medicineBills(): HasMany
    {
        return $this->hasMany(MedicineBills::class);
    }

    public function patientMedicines(): HasMany
    {
        return $this->hasMany(PatientMedicines::class);
    }
}
