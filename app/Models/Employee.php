<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'NationalNumber',
        'DepartmentID',
        'Address',
        'HairDate',
        'BirthDate',
        'Gender',
        'Salary',
        'ManagerID',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'DepartmentID' => 'integer',
        'HairDate' => 'date',
        'BirthDate' => 'date',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(Users::class);
    }

    public function departments(): BelongsTo
    {
        return $this->belongsTo(Departments::class);
    }

    public function id(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function departmentID(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function certificationEmployees(): HasMany
    {
        return $this->hasMany(CertificationEmployees::class);
    }

    public function diagnoseds(): HasMany
    {
        return $this->hasMany(Diagnoseds::class);
    }

    public function workSchedules(): HasMany
    {
        return $this->hasMany(WorkSchedules::class);
    }

    public function patientsOperations(): HasMany
    {
        return $this->hasMany(PatientsOperations::class);
    }

    public function (): HasMany
    {
        return $this->hasMany(::class);
    }
}
