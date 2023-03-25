<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CertificationEmployee extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'EmployeeID',
        'CertificationID',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'EmployeeID' => 'integer',
        'CertificationID' => 'integer',
    ];

    public function employees(): BelongsTo
    {
        return $this->belongsTo(Employees::class);
    }

    public function certifications(): BelongsTo
    {
        return $this->belongsTo(Certifications::class);
    }

    public function employeeID(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function certificationID(): BelongsTo
    {
        return $this->belongsTo(Certification::class);
    }
}
