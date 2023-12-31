<?php

namespace App\Http\Requests\Api\Authentication;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
          'NickName' =>['required'],
          'FirstName'=>['required'],
          'LastName'=>['required'],
          'email'=>['required', 'email','unique:users,email'],
          'password'=>['required','string','min:8','max:16'],
          'PhoneNumber'=>['required','size:9'],
          'Country'=>['nullable'],
          'City'=>['nullable'],
          'ProfileImage'=>['nullable','image'],
          'icon'=>['nullable','image'],
        ];
    }
}
