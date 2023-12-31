<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diagnosed extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'DoctoriD',
        'PatientID',
        'DiseaseID',
        'Details',
        'PatientAppointmentID',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'DoctoriD' => 'integer',
        'PatientID' => 'integer',
        'DiseaseID' => 'integer',
        'PatientAppointmentID' => 'integer',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class,'DoctoriD','id');
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class,'PatientID','id');
    }

    public function disease(): BelongsTo
    {
        return $this->belongsTo(Disease::class,'DiseaseID','id');
    }

    public function diagnosed(): HasMany
    {
        return $this->HasMany(Diagnosed::class,'DiagnosedID','id');
    }
    public function PatientAppointment(): BelongsTo
    {
        return $this->belongsTo(PatientAppointment::class,'PatientAppointmentID','id');
    }

}
