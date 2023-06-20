<?php

    namespace App\Http\Controllers\Api\AdminController;

    use App\Http\Controllers\Controller;
    use App\Models\Certification;
    use App\Http\Requests\Api\AdminRequest\StoreCertificationRequest;
    use App\Http\Requests\Api\AdminRequest\UpdateCertificationRequest;
    use App\Http\Resources\AdminResource\CertificationResource;
    use Illuminate\Http\Request;

    /**
     * @group Certification
     * 
     * This Api For Certification
     */
    class CertificationController extends Controller
    {
      /**
       * See all Certification
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
          $data = Certification::paginate($request->perPage ?? 15);

          return CertificationResource::collection($data);
      }

      /**
       * See One Certification
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This Certification not found"{
       "message": "not found"
       }
       * 
       */
      public function show(Request $request, Certification $Certification)
      {
          return new CertificationResource($Certification);
      }

      /**
       * Create Certification
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
      public function store(StoreCertificationRequest $request)
      {
          $data = Certification::create($request->validated());

          return new CertificationResource($data);
      }

      /**
       * Update Certification
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 422 scenario="Validation errors"{
       * 
       * @response 404 scenario="This Certification not found"{
       "message": "not found"
       }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       */
      public function update(UpdateCertificationRequest $request, Certification $Certification)
      {
          $Certification->update($request->validated());
          $Certification->refresh();
          return new CertificationResource($Certification);
      }
      /**
       * Delete Certification
       * @response 204 scenario="Success Process"
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This Certification not found"{
       "message": "not found"
       }
       * 
       */
      public function destroy(Certification $Certification)
      {
          $Certification->delete();

          return response()->noContent();
      }
    }
    