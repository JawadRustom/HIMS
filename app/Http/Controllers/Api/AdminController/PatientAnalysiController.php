<?php

    namespace App\Http\Controllers\Api\AdminController;

    use App\Http\Controllers\Controller;
    use App\Models\PatientAnalysi;
    use App\Http\Requests\Api\AdminRequest\StorePatientAnalysiRequest;
    use App\Http\Requests\Api\AdminRequest\UpdatePatientAnalysiRequest;
    use App\Http\Resources\AdminResource\PatientAnalysiResource;
    use Illuminate\Http\Request;

    /**
     * @group PatientAnalysi
     * 
     * This Api For PatientAnalysi
     */
    class PatientAnalysiController extends Controller
    {
      /**
       * See all PatientAnalysi
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
          $data = PatientAnalysi::paginate($request->perPage ?? 15);

          return PatientAnalysiResource::collection($data);
      }

      /**
       * See One PatientAnalysi
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This PatientAnalysi not found"{
       "message": "not found"
       }
       * 
       */
      public function show(Request $request, PatientAnalysi $PatientAnalysi)
      {
          return new PatientAnalysiResource($PatientAnalysi);
      }

      /**
       * Create PatientAnalysi
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
      public function store(StorePatientAnalysiRequest $request)
      {
          $data = PatientAnalysi::create($request->validated());

          return new PatientAnalysiResource($data);
      }

      /**
       * Update PatientAnalysi
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 422 scenario="Validation errors"{
       * 
       * @response 404 scenario="This PatientAnalysi not found"{
       "message": "not found"
       }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       */
      public function update(UpdatePatientAnalysiRequest $request, PatientAnalysi $PatientAnalysi)
      {
          $PatientAnalysi->update($request->validated());
          $PatientAnalysi->refresh();
          return new PatientAnalysiResource($PatientAnalysi);
      }
      /**
       * Delete PatientAnalysi
       * @response 204 scenario="Success Process"
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This PatientAnalysi not found"{
       "message": "not found"
       }
       * 
       */
      public function destroy(PatientAnalysi $PatientAnalysi)
      {
          $PatientAnalysi->delete();

          return response()->noContent();
      }
    }
    