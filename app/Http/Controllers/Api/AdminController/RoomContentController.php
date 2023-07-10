<?php

    namespace App\Http\Controllers\Api\AdminController;

    use App\Http\Controllers\Controller;
    use App\Models\RoomContent;
    use App\Http\Requests\Api\AdminRequest\StoreRoomContentRequest;
    use App\Http\Requests\Api\AdminRequest\UpdateRoomContentRequest;
    use App\Http\Resources\AdminResource\RoomContentResource;
    use Illuminate\Http\Request;

    /**
     * @group RoomContent
     * 
     * This Api For RoomContent
     */
    class RoomContentController extends Controller
    {
      /**
       * See all RoomContent
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
          $data = RoomContent::orderBy('id', 'desc')->paginate($request->perPage ?? 15);

          return RoomContentResource::collection($data);
      }

      /**
       * See One RoomContent
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This RoomContent not found"{
       "message": "not found"
       }
       * 
       */
      public function show(Request $request, RoomContent $RoomContent)
      {
          return new RoomContentResource($RoomContent);
      }

      /**
       * Create RoomContent
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
      public function store(StoreRoomContentRequest $request)
      {
          $data = RoomContent::create($request->validated());

          return new RoomContentResource($data);
      }

      /**
       * Update RoomContent
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 422 scenario="Validation errors"{
       * 
       * @response 404 scenario="This RoomContent not found"{
       "message": "not found"
       }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       */
      public function update(UpdateRoomContentRequest $request, RoomContent $RoomContent)
      {
          $RoomContent->update($request->validated());
          $RoomContent->refresh();
          return new RoomContentResource($RoomContent);
      }
      /**
       * Delete RoomContent
       * @response 204 scenario="Success Process"
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This RoomContent not found"{
       "message": "not found"
       }
       * 
       */
      public function destroy(RoomContent $RoomContent)
      {
          $RoomContent->delete();

          return response()->noContent();
      }
    }
    