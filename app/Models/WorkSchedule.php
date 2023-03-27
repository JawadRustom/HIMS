<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkSchedule extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'EmployeeID',
        'RoomID',
        'FromHour',
        'ToHour',
        'WorkDayName',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'EmployeeID' => 'integer',
        'RoomID' => 'integer',
        'FromHour' => 'date',
        'ToHour' => 'date',
        'WorkDayName' => 'date',
    ];

    public function employees(): BelongsTo
    {
        return $this->belongsTo(Employees::class);
    }

    public function rooms(): BelongsTo
    {
        return $this->belongsTo(Rooms::class);
    }

    public function employeeID(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function roomID(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
