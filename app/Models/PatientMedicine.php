<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientMedicine extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'MedicineID',
        'DiagnosedID',
        'MedicineCaliber',
        'DosagePerDay',
        'DaysCount',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'MedicineID' => 'integer',
        'DiagnosedID' => 'integer',
    ];

    public function medicines(): BelongsTo
    {
        return $this->belongsTo(Medicines::class);
    }

    public function diagnoseds(): BelongsTo
    {
        return $this->belongsTo(Diagnoseds::class);
    }

    public function medicineID(): BelongsTo
    {
        return $this->belongsTo(Medicine::class);
    }

    public function diagnosedID(): BelongsTo
    {
        return $this->belongsTo(Diagnosed::class);
    }
}
