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
      $user = auth()->user();
      $user->load('Patient');
      return new PatientResource($user);
    }
}
