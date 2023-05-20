<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Authentication\LoginRequest;
use App\Http\Requests\Api\Authentication\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function login(LoginRequest $Request)
    {
      if(!Auth::attempt(['email'=>$Request->email,'password'=>$Request->password,'UserTypeId'=>range(3,4)]))
      {
        return response(['message'=>'email or password is wrong'],422);
      }
      $token = auth()->user()->createToken("token")->plainTextToken;
      return response(['token'=>$token]);
    }

    public function LoginAdmin(LoginRequest $Request)
    {
      if(!Auth::attempt(['email'=>$Request->email,'password'=>$Request->password,'UserTypeId'=>range(1,2)]))
      {
        return response(['message'=>'email or password is wrong'],422);
      }
      $token = auth()->user()->createToken("token")->plainTextToken;
      return response(['token'=>$token]);
    }

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

    public function logout()
    {
      auth()->user()->currentAccessToken()->delete();

      return response()->noContent();
    }

}
