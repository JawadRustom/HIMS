<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Authentication\LoginRequest;
use App\Http\Requests\Api\Authentication\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * @group Authentication
 * 
 * This Api For Authentication
 */
class AuthenticationController extends Controller
{
  /**
   * Login
   * 
   * @response {
   * "token":"2|MPvbf6j8OVfoPKuF5bBMUXiE6JrymdQFFHVTHuK1"
   * }
   * 
   * @response 422 scenario="Validation errors"{
   "message": "The email field is required. (and 1 more error)",
   "errors": {
     "email": [
       "The email field is required."
      ],
      "password": [
        "The password field is required."
        ]
      }
}
    * 
    * 
   * @response 401 scenario="Email or password is wrong or user type not user"{
    "message": "email or password is wrong"
   }
   * 
   * @response 400 scenario="User send a valid token"{
   * "message": "You are already logged in"
   * }
   */
    public function login(LoginRequest $Request)
    {
      if(!Auth::attempt(['email'=>$Request->email,'password'=>$Request->password,'UserTypeId'=>range(3,4)]))
      {
        return response(['message'=>'email or password is wrong'],401);
      }
      $token = auth()->user()->createToken("token")->plainTextToken;
      return response(['token'=>$token]);
    }
  /**
   * LoginAdmin
   * 
   * @response {
   * "token":"10|tMg2ECrNKojN04dLReIzUIitovJT0NFA3UWUpQPL"
   * }
   * 
   * @response 422 scenario="Validation errors"{
   "message": "The email field is required. (and 1 more error)",
   "errors": {
     "email": [
       "The email field is required."
      ],
      "password": [
        "The password field is required."
        ]
      }
}
    * 
    * 
   * @response 401 scenario="Email or password is wrong or user type not admin or doctor"{
    "message": "email or password is wrong"
   }
   * 
   * @response 400 scenario="User send a valid token"{
   * "message": "You are already logged in"
   * }
   */
    public function LoginAdmin(LoginRequest $Request)
    {
      if(!Auth::attempt(['email'=>$Request->email,'password'=>$Request->password,'UserTypeId'=>range(1,2)]))
      {
        return response(['message'=>'email or password is wrong'],401);
      }
      $token = auth()->user()->createToken("token")->plainTextToken;
      return response(['token'=>$token]);
    }
  /**
   * Register
   * 
   * @response {
   * "token":"11|mrQIWhkKsOorLKuQC0scfJWiKvv7scLmuw2wz71T"
   * }
   * 
   * @response 422 scenario="Validation errors"{
    "message": "The nick name field is required. (and 5 more errors)",
    "errors": {
        "NickName": [
            "The nick name field is required."
        ],
        "FirstName": [
            "The first name field is required."
        ],
        "LastName": [
            "The last name field is required."
        ],
        "email": [
            "The email has already been taken."
        ],
        "password": [
            "The password field must be at least 8 characters."
        ],
        "PhoneNumber": [
            "The phone number field is required."
        ]
    }
    * 
    * 
   * 
   * @response 400 scenario="User aalready login{
   * "message": "You are already logged in"
   * }
   */
    public function register(RegisterRequest $Request)
    {
      $user=User::create([
        'NickName' =>$Request->NickName,
        'FirstName'=>$Request->FirstName,
        'LastName'=>$Request->LastName,
        'email'=>$Request->email,
        'password'=>Hash::make($Request->password),
        'PhoneNumber'=>$Request->PhoneNumber,
        'Country'=>$Request->Country,
        'City'=>$Request->City,
        'ProfileImage'=>$Request->file('ProfileImage')?->store('pic'),
        'icon'=>$Request->icon,
        'UserTypeId'=>4,
      ]);

      Auth::attempt(['email'=>$Request->email,'password'=>$Request->password]);
      $token = auth()->user()->createToken("token")->plainTextToken;
      return response(['token'=>$token]);
    }
  /**
   * Logout
   * 
   * 
   * @response 204 scenario="Logout Success"{
    * 
    * 
   * @response 401 scenario="User Not Login Yet"{
   *     "message": "Unauthenticated."
   * }
   */
    public function logout()
    {
      auth()->user()->currentAccessToken()->delete();

      return response()->noContent();
    }

}
