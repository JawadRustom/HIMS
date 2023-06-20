<?php

    namespace App\Http\Controllers\Api\AdminController;

    use App\Http\Controllers\Controller;
    use App\Models\Clinic;
    use App\Http\Requests\Api\AdminRequest\StoreClinicRequest;
    use App\Http\Requests\Api\AdminRequest\UpdateClinicRequest;
    use App\Http\Resources\AdminResource\ClinicResource;
    use Illuminate\Http\Request;

    /**
     * @group Clinic
     * 
     * This Api For Clinic
     */
    class ClinicController extends Controller
    {
      /**
       * See all Clinic
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
          $data = Clinic::paginate($request->perPage ?? 15);

          return ClinicResource::collection($data);
      }

      /**
       * See One Clinic
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This Clinic not found"{
       "message": "not found"
       }
       * 
       */
      public function show(Request $request, Clinic $Clinic)
      {
          return new ClinicResource($Clinic);
      }

      /**
       * Create Clinic
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
      public function store(StoreClinicRequest $request)
      {
          $data = Clinic::create($request->validated());

          return new ClinicResource($data);
      }

      /**
       * Update Clinic
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 422 scenario="Validation errors"{
       * 
       * @response 404 scenario="This Clinic not found"{
       "message": "not found"
       }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       */
      public function update(UpdateClinicRequest $request, Clinic $Clinic)
      {
          $Clinic->update($request->validated());
          $Clinic->refresh();
          return new ClinicResource($Clinic);
      }
      /**
       * Delete Clinic
       * @response 204 scenario="Success Process"
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This Clinic not found"{
       "message": "not found"
       }
       * 
       */
      public function destroy(Clinic $Clinic)
      {
          $Clinic->delete();

          return response()->noContent();
      }
    }
    