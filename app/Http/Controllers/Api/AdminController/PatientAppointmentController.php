<?php

    namespace App\Http\Controllers\Api\AdminController;

    use App\Http\Controllers\Controller;
    use App\Models\PatientAppointment;
    use App\Http\Requests\Api\AdminRequest\StorePatientAppointmentRequest;
    use App\Http\Requests\Api\AdminRequest\UpdatePatientAppointmentRequest;
    use App\Http\Resources\AdminResource\PatientAppointmentResource;
    use Illuminate\Http\Request;

    /**
     * @group PatientAppointment
     * 
     * This Api For PatientAppointment
     */
    class PatientAppointmentController extends Controller
    {
      /**
       * See all PatientAppointment
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
          $data = PatientAppointment::paginate($request->perPage ?? 15);

          return PatientAppointmentResource::collection($data);
      }

      /**
       * See One PatientAppointment
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This PatientAppointment not found"{
       "message": "not found"
       }
       * 
       */
      public function show(Request $request, PatientAppointment $PatientAppointment)
      {
          return new PatientAppointmentResource($PatientAppointment);
      }

      /**
       * Create PatientAppointment
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
      public function store(StorePatientAppointmentRequest $request)
      {
          $data = PatientAppointment::create($request->validated());

          return new PatientAppointmentResource($data);
      }

      /**
       * Update PatientAppointment
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 422 scenario="Validation errors"{
       * 
       * @response 404 scenario="This PatientAppointment not found"{
       "message": "not found"
       }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       */
      public function update(UpdatePatientAppointmentRequest $request, PatientAppointment $PatientAppointment)
      {
          $PatientAppointment->update($request->validated());
          $PatientAppointment->refresh();
          return new PatientAppointmentResource($PatientAppointment);
      }
      /**
      
       * Delete PatientAppointment
       * @response 204 scenario="Success Process"
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This PatientAppointment not found"{
       "message": "not found"
       }
       * 
       */
      public function destroy(PatientAppointment $PatientAppointment)
      {
          $PatientAppointment->delete();

          return response()->noContent();
      }
    }
    