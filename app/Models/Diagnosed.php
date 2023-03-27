<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function employees(): BelongsTo
    {
        return $this->belongsTo(Employees::class);
    }

    public function patients(): BelongsTo
    {
        return $this->belongsTo(Patients::class);
    }

    public function diseases(): BelongsTo
    {
        return $this->belongsTo(Diseases::class);
    }

    public function patientMedicines(): BelongsTo
    {
        return $this->belongsTo(PatientMedicines::class);
    }

    public function doctoriD(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function patientID(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function diseaseID(): BelongsTo
    {
        return $this->belongsTo(Disease::class);
    }

    public function patientAppointmentID(): BelongsTo
    {
        return $this->belongsTo(PatientAppointment::class);
    }
}
