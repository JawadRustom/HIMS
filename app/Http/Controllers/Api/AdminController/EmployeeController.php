<?php

    namespace App\Http\Controllers\Api\AdminController;

    use App\Http\Controllers\Controller;
    use App\Models\Employee;
    use App\Http\Requests\Api\AdminRequest\StoreEmployeeRequest;
    use App\Http\Requests\Api\AdminRequest\UpdateEmployeeRequest;
    use App\Http\Resources\AdminResource\EmployeeResource;
    use Illuminate\Http\Request;

    /**
     * @group Employee
     * 
     * This Api For Employee
     */
    class EmployeeController extends Controller
    {
      /**
       * See all Employee
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * * @queryparam perPage int 
       * To return limite data in single page.
       * Defaults value for variable '15'.
       * 
       */
      public function index(Request $request)
      {
          $data = Employee::orderBy('id', 'desc')->paginate($request->perPage ?? 15);

          return EmployeeResource::collection($data);
      }

      /**
       * See One Employee
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This Employee not found"{
       "message": "not found"
       }
       * 
       */
      public function show(Request $request, Employee $Employee)
      {
          return new EmployeeResource($Employee);
      }

      /**
       * Create Employee
       * @response 200 scenario="Success Process"{
       * }
       * 
       * 
       * @response 422 scenario="Validation errors"{

       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       */
      public function store(StoreEmployeeRequest $request)
      {
          $data = Employee::create($request->validated());

          return new EmployeeResource($data);
      }

      /**
       * Update Employee
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 422 scenario="Validation errors"{
       * 
       * @response 404 scenario="This Employee not found"{
       "message": "not found"
       }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       */
      public function update(UpdateEmployeeRequest $request, Employee $Employee)
      {
          $Employee->update($request->validated());
          $Employee->refresh();
          return new EmployeeResource($Employee);
      }
      /**
       * Delete Employee
       * @response 204 scenario="Success Process"
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This Employee not found"{
       "message": "not found"
       }
       * 
       */
      public function destroy(Employee $Employee)
      {
          $Employee->delete();

          return response()->noContent();
      }
    }
    