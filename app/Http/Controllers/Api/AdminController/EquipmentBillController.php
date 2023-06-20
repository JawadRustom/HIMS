<?php

    namespace App\Http\Controllers\Api\AdminController;

    use App\Http\Controllers\Controller;
    use App\Models\EquipmentBill;
    use App\Http\Requests\Api\AdminRequest\StoreEquipmentBillRequest;
    use App\Http\Requests\Api\AdminRequest\UpdateEquipmentBillRequest;
    use App\Http\Resources\AdminResource\EquipmentBillResource;
    use Illuminate\Http\Request;

    /**
     * @group EquipmentBill
     * 
     * This Api For EquipmentBill
     */
    class EquipmentBillController extends Controller
    {
      /**
       * See all EquipmentBill
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
          $data = EquipmentBill::paginate($request->perPage ?? 15);

          return EquipmentBillResource::collection($data);
      }

      /**
       * See One EquipmentBill
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This EquipmentBill not found"{
       "message": "not found"
       }
       * 
       */
      public function show(Request $request, EquipmentBill $EquipmentBill)
      {
          return new EquipmentBillResource($EquipmentBill);
      }

      /**
       * Create EquipmentBill
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
      public function store(StoreEquipmentBillRequest $request)
      {
          $data = EquipmentBill::create($request->validated());

          return new EquipmentBillResource($data);
      }

      /**
       * Update EquipmentBill
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 422 scenario="Validation errors"{
       * 
       * @response 404 scenario="This EquipmentBill not found"{
       "message": "not found"
       }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       */
      public function update(UpdateEquipmentBillRequest $request, EquipmentBill $EquipmentBill)
      {
          $EquipmentBill->update($request->validated());
          $EquipmentBill->refresh();
          return new EquipmentBillResource($EquipmentBill);
      }
      /**
       * Delete EquipmentBill
       * @response 204 scenario="Success Process"
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This EquipmentBill not found"{
       "message": "not found"
       }
       * 
       */
      public function destroy(EquipmentBill $EquipmentBill)
      {
          $EquipmentBill->delete();

          return response()->noContent();
      }
    }
    