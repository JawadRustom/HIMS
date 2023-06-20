<?php

    namespace App\Http\Controllers\Api\AdminController;

    use App\Http\Controllers\Controller;
    use App\Models\User;
    use App\Http\Requests\Api\AdminRequest\StoreUserRequest;
    use App\Http\Requests\Api\AdminRequest\UpdateUserRequest;
    use App\Http\Resources\AdminResource\UserResource;
    use Illuminate\Http\Request;

    /**
     * @group User
     * 
     * This Api For User
     */
    class UserController extends Controller
    {
      /**
       * See all User
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
          $data = User::paginate($request->perPage ?? 15);

          return UserResource::collection($data);
      }

      /**
       * See One User
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This User not found"{
       "message": "not found"
       }
       * 
       */
      public function show(Request $request, User $User)
      {
          return new UserResource($User);
      }

      /**
       * Create User
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
      public function store(StoreUserRequest $request)
      {
          $data = User::create($request->validated());

          return new UserResource($data);
      }

      /**
       * Update User
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 422 scenario="Validation errors"{
       * 
       * @response 404 scenario="This User not found"{
       "message": "not found"
       }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       */
      public function update(UpdateUserRequest $request, User $User)
      {
          $User->update($request->validated());
          $User->refresh();
          return new UserResource($User);
      }
      /**
       * Delete User
       * @response 204 scenario="Success Process"
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This User not found"{
       "message": "not found"
       }
       * 
       */
      public function destroy(User $User)
      {
          $User->delete();

          return response()->noContent();
      }
    }
    