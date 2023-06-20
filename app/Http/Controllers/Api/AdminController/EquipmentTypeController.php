<?php

    namespace App\Http\Controllers\Api\AdminController;

    use App\Http\Controllers\Controller;
    use App\Models\EquipmentType;
    use App\Http\Requests\Api\AdminRequest\StoreEquipmentTypeRequest;
    use App\Http\Requests\Api\AdminRequest\UpdateEquipmentTypeRequest;
    use App\Http\Resources\AdminResource\EquipmentTypeResource;
    use Illuminate\Http\Request;

    /**
     * @group EquipmentType
     * 
     * This Api For EquipmentType
     */
    class EquipmentTypeController extends Controller
    {
      /**
       * See all EquipmentType
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
          $data = EquipmentType::paginate($request->perPage ?? 15);

          return EquipmentTypeResource::collection($data);
      }

      /**
       * See One EquipmentType
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This EquipmentType not found"{
       "message": "not found"
       }
       * 
       */
      public function show(Request $request, EquipmentType $EquipmentType)
      {
          return new EquipmentTypeResource($EquipmentType);
      }

      /**
       * Create EquipmentType
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
      public function store(StoreEquipmentTypeRequest $request)
      {
          $data = EquipmentType::create($request->validated());

          return new EquipmentTypeResource($data);
      }

      /**
       * Update EquipmentType
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 422 scenario="Validation errors"{
       * 
       * @response 404 scenario="This EquipmentType not found"{
       "message": "not found"
       }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       */
      public function update(UpdateEquipmentTypeRequest $request, EquipmentType $EquipmentType)
      {
          $EquipmentType->update($request->validated());
          $EquipmentType->refresh();
          return new EquipmentTypeResource($EquipmentType);
      }
      /**
       * Delete EquipmentType
       * @response 204 scenario="Success Process"
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This EquipmentType not found"{
       "message": "not found"
       }
       * 
       */
      public function destroy(EquipmentType $EquipmentType)
      {
          $EquipmentType->delete();

          return response()->noContent();
      }
    }
    