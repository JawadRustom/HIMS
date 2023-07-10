<?php

    namespace App\Http\Controllers\Api\AdminController;

    use App\Http\Controllers\Controller;
    use App\Models\PatientsOperation;
    use App\Http\Requests\Api\AdminRequest\StorePatientsOperationRequest;
    use App\Http\Requests\Api\AdminRequest\UpdatePatientsOperationRequest;
    use App\Http\Resources\AdminResource\PatientsOperationResource;
    use Illuminate\Http\Request;

    /**
     * @group PatientsOperation
     * 
     * This Api For PatientsOperation
     */
    class PatientsOperationController extends Controller
    {
      /**
       * See all PatientsOperation
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
          $data = PatientsOperation::orderBy('id', 'desc')->paginate($request->perPage ?? 15);

          return PatientsOperationResource::collection($data);
      }

      /**
       * See One PatientsOperation
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This PatientsOperation not found"{
       "message": "not found"
       }
       * 
       */
      public function show(Request $request, PatientsOperation $PatientsOperation)
      {
          return new PatientsOperationResource($PatientsOperation);
      }

      /**
       * Create PatientsOperation
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
      public function store(StorePatientsOperationRequest $request)
      {
          $data = PatientsOperation::create($request->validated());

          return new PatientsOperationResource($data);
      }

      /**
       * Update PatientsOperation
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 422 scenario="Validation errors"{
       * 
       * @response 404 scenario="This PatientsOperation not found"{
       "message": "not found"
       }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       */
      public function update(UpdatePatientsOperationRequest $request, PatientsOperation $PatientsOperation)
      {
          $PatientsOperation->update($request->validated());
          $PatientsOperation->refresh();
          return new PatientsOperationResource($PatientsOperation);
      }
      /**
       * Delete PatientsOperation
       * @response 204 scenario="Success Process"
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This PatientsOperation not found"{
       "message": "not found"
       }
       * 
       */
      public function destroy(PatientsOperation $PatientsOperation)
      {
          $PatientsOperation->delete();

          return response()->noContent();
      }
    }
    