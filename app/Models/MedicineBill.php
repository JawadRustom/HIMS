<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicineBill extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'MedicineID',
        'EmployeeID',
        'BillDate',
        'Quantity',
        'BuyPrice',
        'SalePrice',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'MedicineID' => 'integer',
        'EmployeeID' => 'integer',
        'BillDate' => 'date',
        'Quantity'=>'integer',
        'BuyPrice'=>'integer',
        'SalePrice'=>'integer',
    ];

    public function medicine(): BelongsTo
    {
        return $this->belongsTo(Medicine::class,'MedicineID','id');
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class,'EmployeeID','id');
    }

}
