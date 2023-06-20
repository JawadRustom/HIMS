<?php

    namespace App\Http\Controllers\Api\AdminController;

    use App\Http\Controllers\Controller;
    use App\Models\Department;
    use App\Http\Requests\Api\AdminRequest\StoreDepartmentRequest;
    use App\Http\Requests\Api\AdminRequest\UpdateDepartmentRequest;
    use App\Http\Resources\AdminResource\DepartmentResource;
    use Illuminate\Http\Request;

    /**
     * @group Department
     * 
     * This Api For Department
     */
    class DepartmentController extends Controller
    {
      /**
       * See all Department
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
          $data = Department::paginate($request->perPage ?? 15);

          return DepartmentResource::collection($data);
      }

      /**
       * See One Department
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This Department not found"{
       "message": "not found"
       }
       * 
       */
      public function show(Request $request, Department $Department)
      {
          return new DepartmentResource($Department);
      }

      /**
       * Create Department
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
      public function store(StoreDepartmentRequest $request)
      {
          $data = Department::create($request->validated());
          $data->photo()->create(['filename' => $request->file('filename')?->store('pic')]);

          return new DepartmentResource($data);
      }

      /**
       * Update Department
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 422 scenario="Validation errors"{
       * 
       * @response 404 scenario="This Department not found"{
       "message": "not found"
       }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       */
      public function update(UpdateDepartmentRequest $request, Department $Department)
      {
          $Department->update($request->validated());
          $Department->photo()->update(['filename' => $request->file('filename')?->store('pic')]);
          $Department->refresh();
          return new DepartmentResource($Department);
      }
      /**
       * Delete Department
       * @response 204 scenario="Success Process"
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This Department not found"{
       "message": "not found"
       }
       * 
       */
      public function destroy(Department $Department)
      {
          $Department->delete();

          return response()->noContent();
      }
    }
    