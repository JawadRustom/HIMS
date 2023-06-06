<?php

namespace App\Http\Controllers\Api\PatientController;

use App\Http\Controllers\Controller;
use App\Http\Resources\PatientResource\Dashbord\PatientResource;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function Dashbord()
    {
      // // if(!Auth::attempt(['email'=>$Request->email,'password'=>$Request->password,'UserTypeId'=>range(3,4)]))
      // // {
      // //   return response(['message'=>'email or password is wrong'],401);
      // // }
      // //return new PatientResource(User::find($id));
      // return 'ssss';

      // $user = auth()->user();

      // return new PatientResource($user);
      
    }
}
