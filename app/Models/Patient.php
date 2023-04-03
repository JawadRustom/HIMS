<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'NationalNumber',
        'PatientStatus',
        'Gender',
        'BirthDate',
        'PatientLength',
        'PatientWeight',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'BirthDate' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function id(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function death(): HasOne
    {
        return $this->hasOne(Death::class);
    }

    public function diagnoseds(): HasMany
    {
        return $this->hasMany(Diagnosed::class);
    }

    public function patientAnalysis(): HasMany
    {
        return $this->hasMany(PatientAnalysi::class);
    }

    public function patientAppointments(): HasMany
    {
        return $this->hasMany(PatientAppointment::class);
    }

    public function patientsOperations(): HasMany
    {
        return $this->hasMany(PatientsOperation::class);
    }

    public function patientSymptoms(): HasMany
    {
        return $this->hasMany(PatientSymptom::class);
    }
}
