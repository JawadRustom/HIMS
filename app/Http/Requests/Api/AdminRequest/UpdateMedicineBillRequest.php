<?php

namespace App\Http\Requests\Api\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMedicineBillRequest extends FormRequest
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
        'EmployeeID'=>['required','exists:employees,id'],
        'BillDate'=>['required','before:06/17/2022'],
        'Quantity'=>['required','numeric','min:1'],
        'BuyPrice'=>['required','numeric','min:1'],
        'SalePrice'=>['required','numeric','min:1'],
      ];
    }
    }
    