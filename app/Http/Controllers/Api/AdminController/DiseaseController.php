<?php

    namespace App\Http\Controllers\Api\AdminController;

    use App\Http\Controllers\Controller;
    use App\Models\Disease;
    use App\Http\Requests\Api\AdminRequest\StoreDiseaseRequest;
    use App\Http\Requests\Api\AdminRequest\UpdateDiseaseRequest;
    use App\Http\Resources\AdminResource\DiseaseResource;
    use Illuminate\Http\Request;

    /**
     * @group Disease
     * 
     * This Api For Disease
     */
    class DiseaseController extends Controller
    {
      /**
       * See all Disease
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
          $data = Disease::paginate($request->perPage ?? 15);

          return DiseaseResource::collection($data);
      }

      /**
       * See One Disease
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This Disease not found"{
       "message": "not found"
       }
       * 
       */
      public function show(Request $request, Disease $Disease)
      {
          return new DiseaseResource($Disease);
      }

      /**
       * Create Disease
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
      public function store(StoreDiseaseRequest $request)
      {
          $data = Disease::create($request->validated());

          return new DiseaseResource($data);
      }

      /**
       * Update Disease
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 422 scenario="Validation errors"{
       * 
       * @response 404 scenario="This Disease not found"{
       "message": "not found"
       }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       */
      public function update(UpdateDiseaseRequest $request, Disease $Disease)
      {
          $Disease->update($request->validated());
          $Disease->refresh();
          return new DiseaseResource($Disease);
      }
      /**
       * Delete Disease
       * @response 204 scenario="Success Process"
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This Disease not found"{
       "message": "not found"
       }
       * 
       */
      public function destroy(Disease $Disease)
      {
          $Disease->delete();

          return response()->noContent();
      }
    }
    