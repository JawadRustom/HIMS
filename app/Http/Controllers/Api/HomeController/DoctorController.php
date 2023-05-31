<?php

namespace App\Http\Controllers\Api\HomeController;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\HomeResource\Doctor\CollectionResource\DoctorResourceCollection;
use App\Http\Resources\Api\HomeResource\Doctor\Resource\DoctorResource;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use Illuminate\Http\Request;

/**
 * @group DoctorHome
 * 
 * APIs For Doctor In Home Page
 */
class DoctorController extends Controller
{
  
    /**
     * See All Doctor
     * 
     * @response 200 scenario="Success Process"{
     * 
     * }
     * 
     * @queryparam DataCount int 
     * To return limite data in single page.
     * Defaults value for variable '15'.
     */
    public function index($DataCount=15)
    {
      
      //$doctors = Employee::whereHas('User',fn($query)=>$query->whereHas('UserType',fn($query)=>$query->where('UserType','Doctor')))->get('FirstName');
      //$doctors = DB::table('employees')->join('users','users.id','=','employees.user_id')->select('users.FirstName')->get();
      // $doctors = DB::table('employees')
      // ->join('users','users.id','=','employees.user_id')
      // ->join('employee_types','employee_types.id','=','employees.EmployeeTypeId')
      // ->where('employee_types.Type','Doctor')
      // ->join('certification_employees','certification_employees.EmployeeID','=','employees.id')
      // ->join('certifications','certification_employees.CertificationID','=','certifications.id')
      // ->select('users.FirstName','certifications.CertificationName','users.City','users.Country','certifications.CertificationDonor',experianceYear(),'users.ProfileImage')
      // ->paginate($DataCount);
      //$doctors = Employee::whereHas('User',fn($query)=>$query->whereHas('UserType',fn($query)=>$query->where('UserType','Doctor')))->get();
      //$doctor=Employee::with('user')->with('certificationEmployee')->get();
      
      $doctors = DoctorResource::collection(Employee::get());//How Can User Paginate With Resource Way
      return response([
        'Doctors'=>$doctors
      ],200);
    }
    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
      
    }
}
