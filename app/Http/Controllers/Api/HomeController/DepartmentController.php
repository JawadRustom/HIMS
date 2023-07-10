<?php

namespace App\Http\Controllers\Api\HomeController;

use App\Http\Controllers\Controller;
use App\Http\Resources\HomeResource\Department\Index\DepartmentResource;
use App\Models\Department;
use Illuminate\Http\Request;

/**
 * @group DepartmentHome
 * 
 * APIs For Departments In Home Page
 */
class DepartmentController extends Controller
{
  /**
   * See all Department
   * @response 200 scenario="Success Process"{
    "data": [
        {
            "department_id": 1,
            "department_name": "eum",
            "description": "Where CAN I have to beat time when I grow up, I'll write one--but I'm grown up now,' she said, 'than waste it in a hurry: a large plate came skimming out, straight at the proposal. 'Then the.",
            "Image": null
        },
        {
            "department_id": 2,
            "department_name": "cumque",
            "description": "March Hare will be much the most curious thing I ever saw one that size? Why, it fills the whole thing very absurd, but they began moving about again, and made another rush at the Lizard as she.",
            "Image": null
        },
        {
            "department_id": 3,
            "department_name": "animi",
            "description": "Queen: so she went on in the air. She did it so VERY wide, but she thought at first she thought it over here,' said the Hatter. 'Stolen!' the King said, turning to Alice for protection. 'You shan't.",
            "Image": null
        }
    ],
    "links": {
        "first": "http://127.0.0.1:8000/api/Department?page=1",
        "last": "http://127.0.0.1:8000/api/Department?page=47",
        "prev": null,
        "next": "http://127.0.0.1:8000/api/Department?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 47,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/Department?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": "http://127.0.0.1:8000/api/Department?page=2",
                "label": "2",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/Department?page=3",
                "label": "3",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/Department?page=4",
                "label": "4",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/Department?page=5",
                "label": "5",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/Department?page=6",
                "label": "6",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/Department?page=7",
                "label": "7",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/Department?page=8",
                "label": "8",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/Department?page=9",
                "label": "9",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/Department?page=10",
                "label": "10",
                "active": false
            },
            {
                "url": null,
                "label": "...",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/Department?page=46",
                "label": "46",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/Department?page=47",
                "label": "47",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/Department?page=2",
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://127.0.0.1:8000/api/Department",
        "per_page": 3,
        "to": 3,
        "total": 141
    }
}
   * 
   * 
   * @queryparam perPage int 
   * To return limite data in single page.
   * Defaults value for variable '15'.
   * 
   */
  public function index(Request $request)
  {
    return DepartmentResource::orderBy('id', 'desc')->collection(Department::paginate($request->perPage ?? 15));
  }

  /**
   * See One Department
   * @response 200 scenario="Success Process"{
    "data": {
        "department_id": 141,
        "department_name": "asasssssssssa",
        "description": "aassassasasas",
        "Image": "odksaok"
    }
}
   * 
   * @response 404 scenario="This Department not found"{
    "message": "not found"
}
   */
  public function show(Department $Department)
  {
    return new DepartmentResource($Department);
  }
}
