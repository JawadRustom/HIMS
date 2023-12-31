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
        'doctor_id',
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
        'doctor_id'=>'integer',
        'AppointmentDate' => 'datetime',
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class,'PatientID','id');
    }

    public function clinic(): BelongsTo
    {
        return $this->belongsTo(Clinic::class,'ClinicID','id');
    }

    public function Diagnosed(): HasMany
    {
        return $this->hasMany(Diagnosed::class,'PatientAppointmentID','id');
    }

    public function employee(): BelongsTo
    {
        return $this->BelongsTo(Employee::class,'doctor_id','id');
    }
}
