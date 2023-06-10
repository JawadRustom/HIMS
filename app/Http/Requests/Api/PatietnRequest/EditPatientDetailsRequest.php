<?php

namespace App\Http\Requests\Api\PatietnRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditPatientDetailsRequest extends FormRequest
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
        'NickName' =>['nullable'],
        'FirstName'=>['nullable'],
        'LastName'=>['nullable'],
        'email'=>['nullable', 'email',Rule::unique('users')->ignore(auth()->user())],
        'password'=>['nullable','string','min:8','max:16'],
        'PhoneNumber'=>['nullable'],
        'Country'=>['nullable'],
        'City'=>['nullable'],
        'ProfileImage'=>['nullable','image'],
        'icon'=>['nullable','image'],
      ];
    }
}
