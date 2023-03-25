<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientAppointment extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'PatientID',
        'ClinicID',
        'AppointmentDate',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'PatientID' => 'integer',
        'ClinicID' => 'integer',
        'AppointmentDate' => 'date',
    ];

    public function patients(): BelongsTo
    {
        return $this->belongsTo(Patients::class);
    }

    public function clinics(): BelongsTo
    {
        return $this->belongsTo(Clinics::class);
    }

    public function patientID(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function clinicID(): BelongsTo
    {
        return $this->belongsTo(Clinic::class);
    }

    public function patientAppointments(): HasMany
    {
        return $this->hasMany(PatientAppointments::class);
    }
}
