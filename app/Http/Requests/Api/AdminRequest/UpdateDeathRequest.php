<?php

namespace App\Http\Requests\Api\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDeathRequest extends FormRequest
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
        'PatientID'=>['required','unique:patients,id'],
        'DeathDate'=>['required'],
      ];
    }
    }
    