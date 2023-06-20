<?php

namespace App\Http\Requests\Api\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreDiagnosedRequest extends FormRequest
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
        'DoctoriD'=>['required','exists:employees,id'],
        'PatientID'=>['required','exists:patients,id'],
        'DiseaseID'=>['required','exists:diseases,id'],
        'Details'=>['required'],
        'PatientAppointmentID'=>['required','exists:patient_appointments,id'],
      ];
    }
    }
    