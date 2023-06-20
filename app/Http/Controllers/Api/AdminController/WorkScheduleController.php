<?php

    namespace App\Http\Controllers\Api\AdminController;

    use App\Http\Controllers\Controller;
    use App\Models\WorkSchedule;
    use App\Http\Requests\Api\AdminRequest\StoreWorkScheduleRequest;
    use App\Http\Requests\Api\AdminRequest\UpdateWorkScheduleRequest;
    use App\Http\Resources\AdminResource\WorkScheduleResource;
    use Illuminate\Http\Request;

    /**
     * @group WorkSchedule
     * 
     * This Api For WorkSchedule
     */
    class WorkScheduleController extends Controller
    {
      /**
       * See all WorkSchedule
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
          $data = WorkSchedule::paginate($request->perPage ?? 15);

          return WorkScheduleResource::collection($data);
      }

      /**
       * See One WorkSchedule
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This WorkSchedule not found"{
       "message": "not found"
       }
       * 
       */
      public function show(Request $request, WorkSchedule $WorkSchedule)
      {
          return new WorkScheduleResource($WorkSchedule);
      }

      /**
       * Create WorkSchedule
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
      public function store(StoreWorkScheduleRequest $request)
      {
          $data = WorkSchedule::create($request->validated());

          return new WorkScheduleResource($data);
      }

      /**
       * Update WorkSchedule
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 422 scenario="Validation errors"{
       * 
       * @response 404 scenario="This WorkSchedule not found"{
       "message": "not found"
       }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       */
      public function update(UpdateWorkScheduleRequest $request, WorkSchedule $WorkSchedule)
      {
          $WorkSchedule->update($request->validated());
          $WorkSchedule->refresh();
          return new WorkScheduleResource($WorkSchedule);
      }
      /**
       * Delete WorkSchedule
       * @response 204 scenario="Success Process"
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This WorkSchedule not found"{
       "message": "not found"
       }
       * 
       */
      public function destroy(WorkSchedule $WorkSchedule)
      {
          $WorkSchedule->delete();

          return response()->noContent();
      }
    }
    