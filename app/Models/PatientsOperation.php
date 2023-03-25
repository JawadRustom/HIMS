<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientsOperation extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'PatientID',
        'DoctorID',
        'AnesthesiologistID',
        'OperationID',
        'OperationDate',
        'DoctorCommission',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'PatientID' => 'integer',
        'DoctorID' => 'integer',
        'AnesthesiologistID' => 'integer',
        'OperationID' => 'integer',
        'OperationDate' => 'date',
    ];

    public function patients(): BelongsTo
    {
        return $this->belongsTo(Patients::class);
    }

    public function employees(): BelongsTo
    {
        return $this->belongsTo(Employees::class);
    }

    public function operations(): BelongsTo
    {
        return $this->belongsTo(Operations::class);
    }

    public function patientID(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctorID(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function anesthesiologistID(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function operationID(): BelongsTo
    {
        return $this->belongsTo(Operation::class);
    }
}
