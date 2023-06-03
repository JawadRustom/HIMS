<?php

namespace App\Http\Controllers\Api\HomeController;

use App\Http\Controllers\Controller;
use App\Http\Resources\HomeResource\Doctor\Show\DoctorResource;
use App\Http\Resources\HomeResource\Doctor\Index\DoctorResource as IndexDoctorResource;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use Illuminate\Http\Request;
use Spatie\FlareClient\Http\Exceptions\NotFound;

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
   * "data": [
        {
            "Doctor_ID": 6,
            "type": "Doctor",
            "Doctor_Name": {
                "FirstName": "Fernando",
                "LastName": "Herman"
            },
            "Doctor_Speciality_And_Donor_Name": [],
            "Doctor Experience": 46,
            "Doctor_Image": "http://mclaughlin.com/ipsum-cum-ad-eius-inventore-dolores-et-ratione",
            "Doctor_City": null,
            "Doctor_Country": null
        },
        {
            "Doctor_ID": 17,
            "type": "Doctor",
            "Doctor_Name": {
                "FirstName": "Casper",
                "LastName": "Bayer"
            },
            "Doctor_Speciality_And_Donor_Name": [
                {
                    "Name_Certifications": "vel",
                    "Donor_Certifications": "omnis"
                }
            ],
            "Doctor Experience": 1,
            "Doctor_Image": "http://ankunding.com/optio-eaque-quia-officia-harum-iure",
            "Doctor_City": null,
            "Doctor_Country": null
        },
        {
            "Doctor_ID": 18,
            "type": "Doctor",
            "Doctor_Name": {
                "FirstName": "Kadin",
                "LastName": "King"
            },
            "Doctor_Speciality_And_Donor_Name": [
                {
                    "Name_Certifications": "est",
                    "Donor_Certifications": "molestias"
                }
            ],
            "Doctor Experience": 15,
            "Doctor_Image": "http://goodwin.com/odio-quia-exercitationem-nesciunt-est-molestias",
            "Doctor_City": null,
            "Doctor_Country": null
        },
        {
            "Doctor_ID": 19,
            "type": "Doctor",
            "Doctor_Name": {
                "FirstName": "Raven",
                "LastName": "Wehner"
            },
            "Doctor_Speciality_And_Donor_Name": [
                {
                    "Name_Certifications": "et",
                    "Donor_Certifications": "facilis"
                }
            ],
            "Doctor Experience": 43,
            "Doctor_Image": "http://koelpin.info/enim-nesciunt-dolor-inventore-nihil-corrupti-eum-veniam-at",
            "Doctor_City": null,
            "Doctor_Country": null
        }
    ],
    "links": {
        "first": "http://127.0.0.1:8000/api/Doctor?page=1",
        "last": "http://127.0.0.1:8000/api/Doctor?page=6",
        "prev": null,
        "next": "http://127.0.0.1:8000/api/Doctor?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 6,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/Doctor?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": "http://127.0.0.1:8000/api/Doctor?page=2",
                "label": "2",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/Doctor?page=3",
                "label": "3",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/Doctor?page=4",
                "label": "4",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/Doctor?page=5",
                "label": "5",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/Doctor?page=6",
                "label": "6",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/Doctor?page=2",
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://127.0.0.1:8000/api/Doctor",
        "per_page": 4,
        "to": 4,
        "total": 22
    }
   * }
   * 
   * @queryparam DataCount int 
   * To return limite data in single page.
   * Defaults value for variable '15'.
   */
  public function index($DataCount = 4)
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
    return IndexDoctorResource::collection(Employee::whereHas('EmployeeType', fn ($query) => $query->where('Type', 'Doctor'))->paginate($DataCount));
  }

  /**
   * See One Doctor
   * @response 200 scenario="Success Process"{
    "data": {
        "Doctor_ID": 143,
        "doctor_name": {
            "FirstName": "Ada",
            "LastName": "Marvin"
        },
        "doctor_speciality_and_donor_name": [],
        "doctor experience": 32,
        "doctor_city": null,
        "doctor_country": null,
        "doctor_work_schedule": [
            {
                "from_hour": "12:00 am",
                "to_hour": "12:00 am",
                "day_name": "Wednesday"
            }
        ]
    }
}
   * 
   * @response 404 scenario="This Doctor Not Found"{
    "message": "not found"
}
   */
  public function show(Employee $Doctor)
  {
    if ($Doctor->EmployeeType->Type = 'Doctor') {
      abort(404);
    }
    return new DoctorResource($Doctor);
    //$doctors = Employee::whereHas('User',fn($query)=>$query->whereHas('UserType',fn($query)=>$query->where('UserType','Doctor')))->get();
    // if($doctors)
    // {
    //   return response(['Doctors'=>$doctors],2S00);
    // }
    // return response(['Doctors'=>$doctors],200);
  }
}
