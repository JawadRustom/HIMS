<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserTypeMiddlware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
      if($role == 'patient' && auth()->user()->UserType->UserType != 'Patient'){
          return response(['message' => 'unauthorized'], 401);
      }
      if($role == 'admin' && auth()->user()->UserType->UserType != 'Admin'){
          return response(['message' => 'unauthorized'], 401);
      }
      if($role == 'doctor' && auth()->user()->UserType->UserType != 'Doctor'){
          return response(['message' => 'unauthorized'], 401);
      }
      if($role == 'user' && auth()->user()->UserType->UserType != 'User'){
          return response(['message' => 'unauthorized'], 401);
      }
      return $next($request);
    }
}
