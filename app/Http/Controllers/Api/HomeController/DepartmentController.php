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
            "department_name": "modi",
            "description": "Cat again, sitting on the breeze that followed them, the melancholy words:-- 'Soo--oop of the jury had a door leading right into it. 'That's very curious!' she thought. 'But everything's curious."
        },
        {
            "department_id": 2,
            "department_name": "id",
            "description": "Dormouse fell asleep instantly, and Alice thought she might as well as she said to the Cheshire Cat, she was playing against herself, for this curious child was very hot, she kept fanning herself."
        },
        {
            "department_id": 3,
            "department_name": "minima",
            "description": "King hastily said, and went to school in the middle of her sister, as well as pigs, and was gone across to the table, half hoping that they were all turning into little cakes as they came nearer."
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
        "total": 140
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
      return DepartmentResource::collection(Department::paginate($request->perPage ?? 15));
    }

  /**
   * See One Department
   * @response 200 scenario="Success Process"{
    "data": {
        "post_id": 1,
        "post_title": "Dr.",
        "post_text": "Quia et nihil possimus rerum. Dolor aut quo ut voluptates facilis. Quis voluptatem quod alias. Accusamus a provident voluptatum molestias et quae doloremque quo. Provident voluptatem minima quia.",
        "post_type": "Event"
    }
}
   * 
   * @response 404 scenario="This Department not found"{
    "message": "not found"
}
   */
    public function show(Department $department)
    {
      // if (!$department) {
      //   abort(404);
      // }
      //return new DepartmentResource(Department::find(1)); This run
      return new DepartmentResource($department);// But this not run
    }
}
