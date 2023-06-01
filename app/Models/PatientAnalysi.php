<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientAnalysi extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'PatientID',
        'AnalysisID',
        'AnalysisDate',
        'AnalysisRatio',
        'AnalysisResult',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'PatientID' => 'integer',
        'AnalysisID' => 'integer',
        'AnalysisDate' => 'date',
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class,'PatientID','id');
    }

    public function analysi(): BelongsTo
    {
        return $this->belongsTo(Analysi::class,'AnalysisID','id');
    }

}
