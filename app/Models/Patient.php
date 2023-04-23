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
        'PatientLength'=>'integer',
        'PatientWeight'=>'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function death(): HasOne
    {
        return $this->hasOne(Death::class);
    }

    public function diagnosed(): HasMany
    {
        return $this->hasMany(Diagnosed::class);
    }

    public function patientAnalysi(): HasMany
    {
        return $this->hasMany(PatientAnalysi::class);
    }

    public function patientAppointment(): HasMany
    {
        return $this->hasMany(PatientAppointment::class);
    }

    public function patientsOperation(): HasMany
    {
        return $this->hasMany(PatientsOperation::class);
    }

    public function patientSymptom(): HasMany
    {
        return $this->hasMany(PatientSymptom::class);
    }
}
