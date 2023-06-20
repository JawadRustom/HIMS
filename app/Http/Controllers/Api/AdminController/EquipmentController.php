<?php

    namespace App\Http\Controllers\Api\AdminController;

    use App\Http\Controllers\Controller;
    use App\Models\Equipment;
    use App\Http\Requests\Api\AdminRequest\StoreEquipmentRequest;
    use App\Http\Requests\Api\AdminRequest\UpdateEquipmentRequest;
    use App\Http\Resources\AdminResource\EquipmentResource;
    use Illuminate\Http\Request;

    /**
     * @group Equipment
     * 
     * This Api For Equipment
     */
    class EquipmentController extends Controller
    {
      /**
       * See all Equipment
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
          $data = Equipment::paginate($request->perPage ?? 15);

          return EquipmentResource::collection($data);
      }

      /**
       * See One Equipment
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This Equipment not found"{
       "message": "not found"
       }
       * 
       */
      public function show(Request $request, Equipment $Equipment)
      {
          return new EquipmentResource($Equipment);
      }

      /**
       * Create Equipment
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
      public function store(StoreEquipmentRequest $request)
      {
          $data = Equipment::create($request->validated());

          return new EquipmentResource($data);
      }

      /**
       * Update Equipment
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 422 scenario="Validation errors"{
       * 
       * @response 404 scenario="This Equipment not found"{
       "message": "not found"
       }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       */
      public function update(UpdateEquipmentRequest $request, Equipment $Equipment)
      {
          $Equipment->update($request->validated());
          $Equipment->refresh();
          return new EquipmentResource($Equipment);
      }
      /**
       * Delete Equipment
       * @response 204 scenario="Success Process"
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This Equipment not found"{
       "message": "not found"
       }
       * 
       */
      public function destroy(Equipment $Equipment)
      {
          $Equipment->delete();

          return response()->noContent();
      }
    }
    