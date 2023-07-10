<?php

    namespace App\Http\Controllers\Api\AdminController;

    use App\Http\Controllers\Controller;
    use App\Models\Death;
    use App\Http\Requests\Api\AdminRequest\StoreDeathRequest;
    use App\Http\Requests\Api\AdminRequest\UpdateDeathRequest;
    use App\Http\Resources\AdminResource\DeathResource;
    use Illuminate\Http\Request;

    /**
     * @group Death
     * 
     * This Api For Death
     */
    class DeathController extends Controller
    {
      /**
       * See all Death
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
          $data = Death::orderBy('id', 'desc')->paginate($request->perPage ?? 15);

          return DeathResource::collection($data);
      }

      /**
       * See One Death
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This Death not found"{
       "message": "not found"
       }
       * 
       */
      public function show(Request $request, Death $Death)
      {
          return new DeathResource($Death);
      }

      /**
       * Create Death
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
      public function store(StoreDeathRequest $request)
      {
          $data = Death::create($request->validated());

          return new DeathResource($data);
      }

      /**
       * Update Death
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 422 scenario="Validation errors"{
       * 
       * @response 404 scenario="This Death not found"{
       "message": "not found"
       }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       */
      public function update(UpdateDeathRequest $request, Death $Death)
      {
          $Death->update($request->validated());
          $Death->refresh();
          return new DeathResource($Death);
      }
      /**
       * Delete Death
       * @response 204 scenario="Success Process"
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This Death not found"{
       "message": "not found"
       }
       * 
       */
      public function destroy(Death $Death)
      {
          $Death->delete();

          return response()->noContent();
      }
    }
    