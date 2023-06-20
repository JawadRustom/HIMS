<?php

namespace App\Http\Requests\Api\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
        'UserTypeId'=>['required','exists:user_types,id'],
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
    