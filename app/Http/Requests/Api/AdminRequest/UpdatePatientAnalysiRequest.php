<?php

namespace App\Http\Requests\Api\AdminRequest;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientAnalysiRequest extends FormRequest
{      
  /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
      return [
        'PatientID'=>['required','exists:patients,id'],
        'AnalysisID'=>['required','exists:analysis,id'],
        'AnalysisDate'=>['required','date','before_or_equal:' . Carbon::today()->format('m/d/Y')],
        'AnalysisRatio'=>['required','numeric','min:1'],
        'AnalysisResult'=>['required','numeric','min:1'],
      ];
    }
    }
    