<?php

    namespace App\Http\Controllers\Api\AdminController;

    use App\Http\Controllers\Controller;
    use App\Models\Symptom;
    use App\Http\Requests\Api\AdminRequest\StoreSymptomRequest;
    use App\Http\Requests\Api\AdminRequest\UpdateSymptomRequest;
    use App\Http\Resources\AdminResource\SymptomResource;
    use Illuminate\Http\Request;

    /**
     * @group Symptom
     * 
     * This Api For Symptom
     */
    class SymptomController extends Controller
    {
      /**
       * See all Symptom
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
          $data = Symptom::paginate($request->perPage ?? 15);

          return SymptomResource::collection($data);
      }

      /**
       * See One Symptom
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This Symptom not found"{
       "message": "not found"
       }
       * 
       */
      public function show(Request $request, Symptom $Symptom)
      {
          return new SymptomResource($Symptom);
      }

      /**
       * Create Symptom
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
      public function store(StoreSymptomRequest $request)
      {
          $data = Symptom::create($request->validated());

          return new SymptomResource($data);
      }

      /**
       * Update Symptom
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 422 scenario="Validation errors"{
       * 
       * @response 404 scenario="This Symptom not found"{
       "message": "not found"
       }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       */
      public function update(UpdateSymptomRequest $request, Symptom $Symptom)
      {
          $Symptom->update($request->validated());
          $Symptom->refresh();
          return new SymptomResource($Symptom);
      }
      /**
       * Delete Symptom
       * @response 204 scenario="Success Process"
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This Symptom not found"{
       "message": "not found"
       }
       * 
       */
      public function destroy(Symptom $Symptom)
      {
          $Symptom->delete();

          return response()->noContent();
      }
    }
    