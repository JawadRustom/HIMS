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

    public function medicine(): BelongsTo
    {
        return $this->belongsTo(Medicine::class,'MedicineID','id');
    }

    public function diagnosed(): BelongsTo
    {
        return $this->belongsTo(Diagnosed::class,'PatientMedicineID','id');
    }

}
