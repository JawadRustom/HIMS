<?php

    namespace App\Http\Controllers\Api\AdminController;

    use App\Http\Controllers\Controller;
    use App\Models\CertificationEmployee;
    use App\Http\Requests\Api\AdminRequest\StoreCertificationEmployeeRequest;
    use App\Http\Requests\Api\AdminRequest\UpdateCertificationEmployeeRequest;
    use App\Http\Resources\AdminResource\CertificationEmployeeResource;
    use Illuminate\Http\Request;

    /**
     * @group CertificationEmployee
     * 
     * This Api For CertificationEmployee
     */
    class CertificationEmployeeController extends Controller
    {
      /**
       * See all CertificationEmployee
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
          $data = CertificationEmployee::orderBy('id', 'desc')->paginate($request->perPage ?? 15);

          return CertificationEmployeeResource::collection($data);
      }

      /**
       * See One CertificationEmployee
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This CertificationEmployee not found"{
       "message": "not found"
       }
       * 
       */
      public function show(Request $request, CertificationEmployee $CertificationEmployee)
      {
          return new CertificationEmployeeResource($CertificationEmployee);
      }

      /**
       * Create CertificationEmployee
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
      public function store(StoreCertificationEmployeeRequest $request)
      {
          $data = CertificationEmployee::create($request->validated());

          return new CertificationEmployeeResource($data);
      }

      /**
       * Update CertificationEmployee
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 422 scenario="Validation errors"{
       * 
       * @response 404 scenario="This CertificationEmployee not found"{
       "message": "not found"
       }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       */
      public function update(UpdateCertificationEmployeeRequest $request, CertificationEmployee $CertificationEmployee)
      {
          $CertificationEmployee->update($request->validated());
          $CertificationEmployee->refresh();
          return new CertificationEmployeeResource($CertificationEmployee);
      }
      /**
       * Delete CertificationEmployee
       * @response 204 scenario="Success Process"
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This CertificationEmployee not found"{
       "message": "not found"
       }
       * 
       */
      public function destroy(CertificationEmployee $CertificationEmployee)
      {
          $CertificationEmployee->delete();

          return response()->noContent();
      }
    }
    