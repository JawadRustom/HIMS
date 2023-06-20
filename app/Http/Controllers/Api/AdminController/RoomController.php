<?php

    namespace App\Http\Controllers\Api\AdminController;

    use App\Http\Controllers\Controller;
    use App\Models\Room;
    use App\Http\Requests\Api\AdminRequest\StoreRoomRequest;
    use App\Http\Requests\Api\AdminRequest\UpdateRoomRequest;
    use App\Http\Resources\AdminResource\RoomResource;
    use Illuminate\Http\Request;

    /**
     * @group Room
     * 
     * This Api For Room
     */
    class RoomController extends Controller
    {
      /**
       * See all Room
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
          $data = Room::paginate($request->perPage ?? 15);

          return RoomResource::collection($data);
      }

      /**
       * See One Room
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This Room not found"{
       "message": "not found"
       }
       * 
       */
      public function show(Request $request, Room $Room)
      {
          return new RoomResource($Room);
      }

      /**
       * Create Room
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
      public function store(StoreRoomRequest $request)
      {
          $data = Room::create($request->validated());

          return new RoomResource($data);
      }

      /**
       * Update Room
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 422 scenario="Validation errors"{
       * 
       * @response 404 scenario="This Room not found"{
       "message": "not found"
       }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       */
      public function update(UpdateRoomRequest $request, Room $Room)
      {
          $Room->update($request->validated());
          $Room->refresh();
          return new RoomResource($Room);
      }
      /**
       * Delete Room
       * @response 204 scenario="Success Process"
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This Room not found"{
       "message": "not found"
       }
       * 
       */
      public function destroy(Room $Room)
      { 
          $Room->delete();

          return response()->noContent();
      }
    }
    