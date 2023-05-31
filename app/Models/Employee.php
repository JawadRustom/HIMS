<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'HireDate',
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
        'HireDate' => 'date',
        'BirthDate' => 'date',
    ];

    protected function experianceYear(): Attribute
    {
        return Attribute::make(get: fn (string $value, array $attributes) => now()->diff($attributes['HairDate'])->y,);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class,'DepartmentID','id');
    }

    public function certificationEmployee(): HasMany
    {
        return $this->hasMany(CertificationEmployee::class,'EmployeeID','id');
    }

    public function diagnosed(): HasMany
    {
        return $this->hasMany(Diagnosed::class,'DoctoriD','id');
    }

    public function workSchedule(): HasMany
    {
        return $this->hasMany(WorkSchedule::class,'EmployeeID','id');
    }

    public function patientsOperationDoctor(): HasMany
    {
        return $this->hasMany(PatientsOperation::class,'DoctorID','id');
    }
    
    public function patientsOperationAnesthesiologist(): HasMany
    {
        return $this->hasMany(PatientsOperation::class,'AnesthesiologistID','id');
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
