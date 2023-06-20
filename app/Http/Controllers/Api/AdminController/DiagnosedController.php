<?php

    namespace App\Http\Controllers\Api\AdminController;

    use App\Http\Controllers\Controller;
    use App\Models\Diagnosed;
    use App\Http\Requests\Api\AdminRequest\StoreDiagnosedRequest;
    use App\Http\Requests\Api\AdminRequest\UpdateDiagnosedRequest;
    use App\Http\Resources\AdminResource\DiagnosedResource;
    use Illuminate\Http\Request;

    /**
     * @group Diagnosed
     * 
     * This Api For Diagnosed
     */
    class DiagnosedController extends Controller
    {
      /**
       * See all Diagnosed
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
          $data = Diagnosed::paginate($request->perPage ?? 15);

          return DiagnosedResource::collection($data);
      }

      /**
       * See One Diagnosed
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This Diagnosed not found"{
       "message": "not found"
       }
       * 
       */
      public function show(Request $request, Diagnosed $Diagnosed)
      {
          return new DiagnosedResource($Diagnosed);
      }

      /**
       * Create Diagnosed
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
      public function store(StoreDiagnosedRequest $request)
      {
          $data = Diagnosed::create($request->validated());

          return new DiagnosedResource($data);
      }

      /**
       * Update Diagnosed
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 422 scenario="Validation errors"{
       * 
       * @response 404 scenario="This Diagnosed not found"{
       "message": "not found"
       }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       */
      public function update(UpdateDiagnosedRequest $request, Diagnosed $Diagnosed)
      {
          $Diagnosed->update($request->validated());
          $Diagnosed->refresh();
          return new DiagnosedResource($Diagnosed);
      }
      /**
       * Delete Diagnosed
       * @response 204 scenario="Success Process"
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This Diagnosed not found"{
       "message": "not found"
       }
       * 
       */
      public function destroy(Diagnosed $Diagnosed)
      {
          $Diagnosed->delete();

          return response()->noContent();
      }
    }
    