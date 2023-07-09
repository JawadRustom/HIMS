<?php

    namespace App\Http\Controllers\Api\AdminController;

    use App\Http\Controllers\Controller;
    use App\Models\Medicine;
    use App\Http\Requests\Api\AdminRequest\StoreMedicineRequest;
    use App\Http\Requests\Api\AdminRequest\UpdateMedicineRequest;
    use App\Http\Resources\AdminResource\MedicineResource;
    use Illuminate\Http\Request;

    /**
     * @group Medicine
     * 
     * This Api For Medicine
     */
    class MedicineController extends Controller
    {
      /**
       * See all Medicine
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
          $data = Medicine::paginate($request->perPage ?? 15);

          return MedicineResource::collection($data);
      }

      /**
       * See One Medicine
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This Medicine not found"{
       "message": "not found"
       }
       * 
       */
      public function show(Request $request, Medicine $Medicine)
      {
          return new MedicineResource($Medicine);
      }

      /**
       * Create Medicine
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
      public function store(StoreMedicineRequest $request)
      {
          $data = Medicine::create($request->validated());

          return new MedicineResource($data);
      }

      /**
       * Update Medicine
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 422 scenario="Validation errors"{
       * 
       * @response 404 scenario="This Medicine not found"{
       "message": "not found"
       }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       */
      public function update(UpdateMedicineRequest $request, Medicine $Medicine)
      {
          $Medicine->update($request->validated());
          $Medicine->refresh();
          return new MedicineResource($Medicine);
      }
      /**
       * Delete Medicine
       * @response 204 scenario="Success Process"
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This Medicine not found"{
       "message": "not found"
       }
       * 
       */
      public function destroy(Medicine $Medicine)
      {
          $Medicine->delete();

          return response()->noContent();
      }
    }
    