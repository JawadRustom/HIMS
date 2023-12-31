<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clinic extends Model
{
  use HasFactory, SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'ClinicsType',
    'DepartmentID',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'DepartmentID' => 'integer',
  ];

  public function department(): BelongsTo
  {
    return $this->belongsTo(Department::class, 'DepartmentID');
  }

  public function PatientAppointment(): HasMany
  {
    return $this->HasMany(PatientAppointment::class, 'ClinicID', 'id');
  }
}
