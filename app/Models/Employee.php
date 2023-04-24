<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function certificationEmployee(): HasMany
    {
        return $this->hasMany(CertificationEmployee::class);
    }

    public function diagnosed(): HasMany
    {
        return $this->hasMany(Diagnosed::class);
    }

    public function workSchedule(): HasMany
    {
        return $this->hasMany(WorkSchedule::class);
    }

    public function patientsOperation(): HasMany
    {
        return $this->hasMany(PatientsOperation::class);
    }

    public function Managerdepartment(): HasOne
    {
        return $this->hasOne(department::class,'ManagerID','id');
    }

    public function employee(): BelongsTo
    {
        return $this->BelongsTo(employee::class,'ManagerID','id');
    }

    public function ManagerID(): HasMany
    {
        return $this->HasMany(employee::class,'ManagerID','id');
    }
    public function EmployeeType(): belongsTo
    {
        return $this->belongsTo(EmployeeType::class,'EmployeeTypeId','id');
    }
}
