<?php

namespace App\Http\Requests\Api\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientMedicineRequest extends FormRequest
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
        'MedicineID'=>['required','exists:medicines,id'],
        'DiagnosedID'=>['required','exists:diagnoseds,id'],
        'MedicineCaliber'=>['required','numeric','min:1'],
        'DosagePerDay'=>['required','numeric','min:1'],
        'DaysCount'=>['required','numeric','min:1'],
      ];
    }
    }
    