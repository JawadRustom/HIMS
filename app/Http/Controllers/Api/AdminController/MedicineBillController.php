<?php

    namespace App\Http\Controllers\Api\AdminController;

    use App\Http\Controllers\Controller;
    use App\Models\MedicineBill;
    use App\Http\Requests\Api\AdminRequest\StoreMedicineBillRequest;
    use App\Http\Requests\Api\AdminRequest\UpdateMedicineBillRequest;
    use App\Http\Resources\AdminResource\MedicineBillResource;
    use Illuminate\Http\Request;

    /**
     * @group MedicineBill
     * 
     * This Api For MedicineBill
     */
    class MedicineBillController extends Controller
    {
      /**
       * See all MedicineBill
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
          $data = MedicineBill::orderBy('id', 'desc')->paginate($request->perPage ?? 15);

          return MedicineBillResource::collection($data);
      }

      /**
       * See One MedicineBill
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This MedicineBill not found"{
       "message": "not found"
       }
       * 
       */
      public function show(Request $request, MedicineBill $MedicineBill)
      {
          return new MedicineBillResource($MedicineBill);
      }

      /**
       * Create MedicineBill
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
      public function store(StoreMedicineBillRequest $request)
      {
          $data = MedicineBill::create($request->validated());

          return new MedicineBillResource($data);
      }

      /**
       * Update MedicineBill
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 422 scenario="Validation errors"{
       * 
       * @response 404 scenario="This MedicineBill not found"{
       "message": "not found"
       }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       */
      public function update(UpdateMedicineBillRequest $request, MedicineBill $MedicineBill)
      {
          $MedicineBill->update($request->validated());
          $MedicineBill->refresh();
          return new MedicineBillResource($MedicineBill);
      }
      /**
       * Delete MedicineBill
       * @response 204 scenario="Success Process"
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This MedicineBill not found"{
       "message": "not found"
       }
       * 
       */
      public function destroy(MedicineBill $MedicineBill)
      {
          $MedicineBill->delete();

          return response()->noContent();
      }
    }
    