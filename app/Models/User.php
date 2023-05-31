<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'NickName',
    'FirstName',
    'LastName',
    'email',
    'password',
    'PhoneNumber',
    'Country',
    'City',
    'ProfileImage',
    'icon',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'id' => 'integer',
    'UserTypeId' => 'integer',
    'email_verified_at' => 'datetime',
  ];

  public function UserType()
  {
    return $this->belongsTo(UserType::class, 'UserTypeId', 'id');
  }

  public function Patient(): HasOne
  {
    return $this->HasOne(Patient::class);
  }

  public function Employee(): HasOne
  {
    return $this->HasOne(Employee::class);
  }
  public function photos()
  {
    return $this->morphMany(Photo::class, 'imageable');
  }
}
