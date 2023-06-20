<?php

    namespace App\Http\Controllers\Api\AdminController;

    use App\Http\Controllers\Controller;
    use App\Models\EmployeeType;
    use App\Http\Requests\Api\AdminRequest\StoreEmployeeTypeRequest;
    use App\Http\Requests\Api\AdminRequest\UpdateEmployeeTypeRequest;
    use App\Http\Resources\AdminResource\EmployeeTypeResource;
    use Illuminate\Http\Request;

    /**
     * @group EmployeeType
     * 
     * This Api For EmployeeType
     */
    class EmployeeTypeController extends Controller
    {
      /**
       * See all EmployeeType
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
          $data = EmployeeType::paginate($request->perPage ?? 15);

          return EmployeeTypeResource::collection($data);
      }

      /**
       * See One EmployeeType
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This EmployeeType not found"{
       "message": "not found"
       }
       * 
       */
      public function show(Request $request, EmployeeType $EmployeeType)
      {
          return new EmployeeTypeResource($EmployeeType);
      }

      /**
       * Create EmployeeType
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
      public function store(StoreEmployeeTypeRequest $request)
      {
          $data = EmployeeType::create($request->validated());

          return new EmployeeTypeResource($data);
      }

      /**
       * Update EmployeeType
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 422 scenario="Validation errors"{
       * 
       * @response 404 scenario="This EmployeeType not found"{
       "message": "not found"
       }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       */
      public function update(UpdateEmployeeTypeRequest $request, EmployeeType $EmployeeType)
      {
          $EmployeeType->update($request->validated());
          $EmployeeType->refresh();
          return new EmployeeTypeResource($EmployeeType);
      }
      /**
       * Delete EmployeeType
       * @response 204 scenario="Success Process"
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This EmployeeType not found"{
       "message": "not found"
       }
       * 
       */
      public function destroy(EmployeeType $EmployeeType)
      {
          $EmployeeType->delete();

          return response()->noContent();
      }
    }
    