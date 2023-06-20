<?php

    namespace App\Http\Controllers\Api\AdminController;

    use App\Http\Controllers\Controller;
    use App\Models\Patient;
    use App\Http\Requests\Api\AdminRequest\StorePatientRequest;
    use App\Http\Requests\Api\AdminRequest\UpdatePatientRequest;
    use App\Http\Resources\AdminResource\PatientResource;
    use Illuminate\Http\Request;

    /**
     * @group Patient
     * 
     * This Api For Patient
     */
    class PatientController extends Controller
    {
      /**
       * See all Patient
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
          $data = Patient::paginate($request->perPage ?? 15);

          return PatientResource::collection($data);
      }

      /**
       * See One Patient
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This Patient not found"{
       "message": "not found"
       }
       * 
       */
      public function show(Request $request, Patient $Patient)
      {
          return new PatientResource($Patient);
      }

      /**
       * Create Patient
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
      public function store(StorePatientRequest $request)
      {
          $data = Patient::create($request->validated());

          return new PatientResource($data);
      }

      /**
       * Update Patient
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 422 scenario="Validation errors"{
       * 
       * @response 404 scenario="This Patient not found"{
       "message": "not found"
       }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       */
      public function update(UpdatePatientRequest $request, Patient $Patient)
      {
          $Patient->update($request->validated());
          $Patient->refresh();
          return new PatientResource($Patient);
      }
      /**
       * Delete Patient
       * @response 204 scenario="Success Process"
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This Patient not found"{
       "message": "not found"
       }
       * 
       */
      public function destroy(Patient $Patient)
      {
          $Patient->delete();

          return response()->noContent();
      }
    }
    