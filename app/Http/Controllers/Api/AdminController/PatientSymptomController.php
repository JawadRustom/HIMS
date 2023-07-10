<?php

    namespace App\Http\Controllers\Api\AdminController;

    use App\Http\Controllers\Controller;
    use App\Models\PatientSymptom;
    use App\Http\Requests\Api\AdminRequest\StorePatientSymptomRequest;
    use App\Http\Requests\Api\AdminRequest\UpdatePatientSymptomRequest;
    use App\Http\Resources\AdminResource\PatientSymptomResource;
    use Illuminate\Http\Request;

    /**
     * @group PatientSymptom
     * 
     * This Api For PatientSymptom
     */
    class PatientSymptomController extends Controller
    {
      /**
       * See all PatientSymptom
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
          $data = PatientSymptom::orderBy('id', 'desc')->paginate($request->perPage ?? 15);

          return PatientSymptomResource::collection($data);
      }

      /**
       * See One PatientSymptom
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This PatientSymptom not found"{
       "message": "not found"
       }
       * 
       */
      public function show(Request $request, PatientSymptom $PatientSymptom)
      {
          return new PatientSymptomResource($PatientSymptom);
      }

      /**
       * Create PatientSymptom
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
      public function store(StorePatientSymptomRequest $request)
      {
          $data = PatientSymptom::create($request->validated());

          return new PatientSymptomResource($data);
      }

      /**
       * Update PatientSymptom
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 422 scenario="Validation errors"{
       * 
       * @response 404 scenario="This PatientSymptom not found"{
       "message": "not found"
       }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       */
      public function update(UpdatePatientSymptomRequest $request, PatientSymptom $PatientSymptom)
      {
          $PatientSymptom->update($request->validated());
          $PatientSymptom->refresh();
          return new PatientSymptomResource($PatientSymptom);
      }
      /**
       * Delete PatientSymptom
       * @response 204 scenario="Success Process"
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This PatientSymptom not found"{
       "message": "not found"
       }
       * 
       */
      public function destroy(PatientSymptom $PatientSymptom)
      {
          $PatientSymptom->delete();

          return response()->noContent();
      }
    }
    