<?php

    namespace App\Http\Controllers\Api\AdminController;

    use App\Http\Controllers\Controller;
    use App\Models\BloodBank;
    use App\Http\Requests\Api\AdminRequest\StoreBloodBankRequest;
    use App\Http\Requests\Api\AdminRequest\UpdateBloodBankRequest;
    use App\Http\Resources\AdminResource\BloodBankResource;
    use Illuminate\Http\Request;

    /**
     * @group BloodBank
     * 
     * This Api For BloodBank
     */
    class BloodBankController extends Controller
    {
      /**
       * See all BloodBank
       * @response 200 scenario="Success Process"{
    "data": [
        {
            "id": 1,
            "name": "enim",
            "type": "temporibus",
            "quantity": 1834,
            "roomID": 11
        },
        {
            "id": 2,
            "name": "alias",
            "type": "libero",
            "quantity": 7118,
            "roomID": 12
        }
    ],
    "links": {
        "first": "http://127.0.0.1:8000/api/BloodBank?page=1",
        "last": "http://127.0.0.1:8000/api/BloodBank?page=5",
        "prev": null,
        "next": "http://127.0.0.1:8000/api/BloodBank?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 5,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/BloodBank?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": "http://127.0.0.1:8000/api/BloodBank?page=2",
                "label": "2",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/BloodBank?page=3",
                "label": "3",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/BloodBank?page=4",
                "label": "4",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/BloodBank?page=5",
                "label": "5",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/BloodBank?page=2",
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://127.0.0.1:8000/api/BloodBank",
        "per_page": 2,
        "to": 2,
        "total": 10
    }
}
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * * @queryparam perPage int 
       * To return limite data in single page.
       * Defaults value for variable '15'.
       * */
      public function index(Request $request)
      {
          $data = BloodBank::orderBy('id', 'desc')->paginate($request->perPage ?? 15);

          return BloodBankResource::collection($data);
      }

      /**
       * See One BloodBank
       * @response 200 scenario="Success Process"{
    "data": {
        "id": 2,
        "name": "alias",
        "type": "libero",
        "quantity": 7118,
        "roomID": 12
    }
}
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * @response 404 scenario="This BloodBank not found"{
        "message": "not found"
        }
       */
      public function show(Request $request, BloodBank $BloodBank)
      {
          return new BloodBankResource($BloodBank);
      }

      /**
       * Create BloodBank
       * @response 200 scenario="Success Process"{
    "data": {
        "id": 12,
        "name": "aaa",
        "type": "aaa",
        "quantity": "11",
        "roomID": 40
    }
}
       * 
       * @response 422 scenario="Validation errors"{
    "message": "The name field is required. (and 3 more errors)",
    "errors": {
        "Name": [
            "The name field is required."
        ],
        "Type": [
            "The type field is required."
        ],
        "Quantity": [
            "The quantity field is required."
        ],
        "Quantity": [
            "The quantity field must be at least 1."
        ],
        "RoomID": [
            "The room i d field is required."
        ]
    }
}
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       */
      public function store(StoreBloodBankRequest $request)
      {
          $data = BloodBank::create($request->validated());

          return new BloodBankResource($data);
      }

      /**
       * Update BloodBank
       * @response 200 scenario="Success Process"{
    "data": {
        "id": 12,
        "name": "aaa",
        "type": "aaa",
        "quantity": 11,
        "roomID": 40
    }
}
       * 
       * @response 422 scenario="Validation errors"{
    "message": "The name field is required. (and 3 more errors)",
    "errors": {
        "Name": [
            "The name field is required."
        ],
        "Type": [
            "The type field is required."
        ],
        "Quantity": [
            "The quantity field is required."
        ],
        "Quantity": [
            "The quantity field must be at least 1."
        ],
        "RoomID": [
            "The room i d field is required."
        ]
    }
}
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * @response 404 scenario="This BloodBank not found"{
        "message": "not found"
        }
       * 
       */
      public function update(UpdateBloodBankRequest $request, BloodBank $BloodBank)
      {
          $BloodBank->update($request->validated());
          $BloodBank->refresh();
          return new BloodBankResource($BloodBank);
      }
      /**
       * Delete BloodBank
       * @response 204 scenario="Success Process"
       * 
       * @response 401 scenario="Account Not Admin"{
       "message": "Unauthenticated."
   }
       * 
       * @response 404 scenario="This BloodBank not found"{
        "message": "not found"
        }
       * 
       */
      public function destroy(BloodBank $BloodBank)
      {
          $BloodBank->delete();

          return response()->noContent();
      }
    }
    