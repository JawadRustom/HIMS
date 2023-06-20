<?php

namespace App\Http\Requests\Api\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientsOperationRequest extends FormRequest
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
        'DoctorID'=>['required','exists:employees,id'],
        'AnesthesiologistID'=>['required','exists:employees,id'],
        'OperationID'=>['required','exists:operations,id'],
        'OperationDate'=>['required','date'],
        'DoctorCommission'=>['required','numeric','min:1'],
      ];
    }
    }
    