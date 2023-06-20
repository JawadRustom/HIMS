<?php

    namespace App\Http\Controllers\Api\AdminController;

    use App\Http\Controllers\Controller;
    use App\Models\Operation;
    use App\Http\Requests\Api\AdminRequest\StoreOperationRequest;
    use App\Http\Requests\Api\AdminRequest\UpdateOperationRequest;
    use App\Http\Resources\AdminResource\OperationResource;
    use Illuminate\Http\Request;

    /**
     * @group Operation
     * 
     * This Api For Operation
     */
    class OperationController extends Controller
    {
      /**
       * See all Operation
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
          $data = Operation::paginate($request->perPage ?? 15);

          return OperationResource::collection($data);
      }

      /**
       * See One Operation
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This Operation not found"{
       "message": "not found"
       }
       * 
       */
      public function show(Request $request, Operation $Operation)
      {
          return new OperationResource($Operation);
      }

      /**
       * Create Operation
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
      public function store(StoreOperationRequest $request)
      {
          $data = Operation::create($request->validated());

          return new OperationResource($data);
      }

      /**
       * Update Operation
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 422 scenario="Validation errors"{
       * 
       * @response 404 scenario="This Operation not found"{
       "message": "not found"
       }
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       */
      public function update(UpdateOperationRequest $request, Operation $Operation)
      {
          $Operation->update($request->validated());
          $Operation->refresh();
          return new OperationResource($Operation);
      }
      /**
       * Delete Operation
       * @response 204 scenario="Success Process"
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * 
       * @response 404 scenario="This Operation not found"{
       "message": "not found"
       }
       * 
       */
      public function destroy(Operation $Operation)
      {
          $Operation->delete();

          return response()->noContent();
      }
    }
    