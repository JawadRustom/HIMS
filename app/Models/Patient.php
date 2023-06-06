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
        'user_id',
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
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function death(): HasOne
    {
        return $this->hasOne(Death::class,'PatientID','id');
    }

    public function diagnosed(): HasMany
    {
        return $this->hasMany(Diagnosed::class,'PatientID','id');
    }

    public function patientAnalysi(): HasMany
    {
        return $this->hasMany(PatientAnalysi::class,'PatientID','id');
    }

    public function patientAppointment(): HasMany
    {
        return $this->hasMany(PatientAppointment::class,'PatientID','id');
    }

    public function patientsOperation(): HasMany
    {
        return $this->hasMany(PatientsOperation::class,'PatientID','id');
    }

    public function patientSymptom(): HasMany
    {
        return $this->hasMany(PatientSymptom::class,'PatientID','id');
    }
}
