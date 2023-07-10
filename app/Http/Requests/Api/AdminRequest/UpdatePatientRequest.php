<?php

namespace App\Http\Requests\Api\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePatientRequest extends FormRequest
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
        'user_id'=>['required','exists:users,id'],
        'NationalNumber'=>['required'],
        'PatientStatus'=>['required'],
        'Gender'=>['required',Rule::in(['Male', 'Female','male', 'female'])],
      //   'Gender'=>['required',function ($attribute, $value, $fail) {
      //     $validChoices = ['Male', 'Female'];
      //     if (!in_array($value, $validChoices)) {
      //         $fail($attribute.' Should Gender Be Male Or Female Only');
      //     }
      // },],
        'BirthDate'=>['required','before:06/17/2020'],
        'PatientLength'=>['required','numeric','min:15','max:250'],
        'PatientWeight'=>['required','numeric','min:7','max:600'],
      ];
    }
    }
    