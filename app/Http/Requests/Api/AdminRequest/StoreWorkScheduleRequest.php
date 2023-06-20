<?php

namespace App\Http\Requests\Api\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkScheduleRequest extends FormRequest
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
        'EmployeeID'=>['required','exists:employees,id'],
        'RoomID'=>['required','exists:rooms,id'],
        'FromHour'=>['required'],
        'ToHour'=>['required'],
        'WorkDayName'=>['required'],
      ];
    }
    }
    