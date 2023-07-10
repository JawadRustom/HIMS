<?php

    namespace App\Http\Controllers\Api\AdminController;

    use App\Http\Controllers\Controller;
    use App\Models\PatientMedicine;
    use App\Http\Requests\Api\AdminRequest\StorePatientMedicineRequest;
    use App\Http\Requests\Api\AdminRequest\UpdatePatientMedicineRequest;
    use App\Http\Resources\AdminResource\PatientMedicineResource;
    use Illuminate\Http\Request;

    /**
     * @group PatientMedicine
     * 
     * This Api For PatientMedicine
     */
    class PatientMedicineController extends Controller
    {
      /**
       * See all PatientMedicine
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
          $data = PatientMedicine::orderBy('id', 'desc')->paginate($request->perPage ?? 15);

          return PatientMedicineResource::collection($data);
      }

      /**
       * See One PatientMedicine
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This PatientMedicine not found"{
       "message": "not found"
       }
       * 
       */
      public function show(Request $request, PatientMedicine $PatientMedicine)
      {
          return new PatientMedicineResource($PatientMedicine);
      }

      /**
       * Create PatientMedicine
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
      public function store(StorePatientMedicineRequest $request)
      {
          $data = PatientMedicine::create($request->validated());

          return new PatientMedicineResource($data);
      }

      /**
       * Update PatientMedicine
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 422 scenario="Validation errors"{
       * 
       * @response 404 scenario="This PatientMedicine not found"{
       "message": "not found"
       }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       */
      public function update(UpdatePatientMedicineRequest $request, PatientMedicine $PatientMedicine)
      {
          $PatientMedicine->update($request->validated());
          $PatientMedicine->refresh();
          return new PatientMedicineResource($PatientMedicine);
      }
      /**
       * Delete PatientMedicine
       * @response 204 scenario="Success Process"
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This PatientMedicine not found"{
       "message": "not found"
       }
       * 
       */
      public function destroy(PatientMedicine $PatientMedicine)
      {
          $PatientMedicine->delete();

          return response()->noContent();
      }
    }
    