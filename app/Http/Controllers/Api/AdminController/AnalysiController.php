<?php

    namespace App\Http\Controllers\Api\AdminController;

    use App\Http\Controllers\Controller;
    use App\Models\Analysi;
    use App\Http\Requests\Api\AdminRequest\StoreAnalysiRequest;
    use App\Http\Requests\Api\AdminRequest\UpdateAnalysiRequest;
    use App\Http\Resources\AdminResource\AnalysiResource;
    use Illuminate\Http\Request;

    /**
     * @group Analysi
     * 
     * This Api For Analysi
     */
    class AnalysiController extends Controller
    {
      /**
       * See all Analysi
       * @response 200 scenario="Success Process"{
    "data": [
        {
            "id": 1,
            "analysis_name": "omnis"
        },
        {
            "id": 2,
            "analysis_name": "incidunt"
        }
    ],
    "links": {
        "first": "http://127.0.0.1:8000/api/Analysis?page=1",
        "last": "http://127.0.0.1:8000/api/Analysis?page=10",
        "prev": null,
        "next": "http://127.0.0.1:8000/api/Analysis?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 10,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/Analysis?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": "http://127.0.0.1:8000/api/Analysis?page=2",
                "label": "2",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/Analysis?page=3",
                "label": "3",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/Analysis?page=4",
                "label": "4",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/Analysis?page=5",
                "label": "5",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/Analysis?page=6",
                "label": "6",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/Analysis?page=7",
                "label": "7",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/Analysis?page=8",
                "label": "8",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/Analysis?page=9",
                "label": "9",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/Analysis?page=10",
                "label": "10",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/Analysis?page=2",
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://127.0.0.1:8000/api/Analysis",
        "per_page": 2,
        "to": 2,
        "total": 20
    }
}
       * @response 401 scenario="Account Not Admin"{
    "message": "Unauthenticated."
}
       * * @queryparam perPage int 
       * To return limite data in single page.
       * Defaults value for variable '15'.
       * */
      public function index(Request $request)
      {
          $data = Analysi::orderBy('id', 'desc')->paginate($request->perPage ?? 15);

          return AnalysiResource::collection($data);
      }

      /**
       * See One Analysi
       * @response 200 scenario="Success Process"{
    "data": {
        "id": 1,
        "analysis_name": "omnis"
    }
}
       * 
       * @response 401 scenario="Account Not Admin"{
    "message": "Unauthenticated."
}
       * 
       * * @response 404 scenario="This Analysi not found"{
        "message": "not found"
        }* */
      public function show(Request $request, Analysi $Analysi)
      {
          return new AnalysiResource($Analysi);
      }

      /**
       * Create Analysi
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 422 scenario="Validation errors"{
    "message": "The analysis name field is required.",
    "errors": {
        "AnalysisName": [
            "The analysis name field is required."
        ]
    }
}
       * 
       * @response 401 scenario="Account Not Admin"{
    "message": "Unauthenticated."
}
       * 
       */
      public function store(StoreAnalysiRequest $request)
      {
          $data = Analysi::create($request->validated());

          return new AnalysiResource($data);
      }

      /**
       * Update Analysi
       * @response 200 scenario="Success Process"{
       * }
       * 
       * @response 422 scenario="Validation errors"{
    "message": "The analysis name field is required.",
    "errors": {
        "AnalysisName": [
            "The analysis name field is required."
        ]
    }
}
       * 
       * @response 401 scenario="Account Not Admin"{
    "message": "Unauthenticated."
}
       * 
       */
      public function update(UpdateAnalysiRequest $request, Analysi $Analysi)
      {
          $Analysi->update($request->validated());
          $Analysi->refresh();
          return new AnalysiResource($Analysi);
      }
      /**
       * Delete Analysi
       * @response 204 scenario="Success Process"
       *
       * @response 401 scenario="Account Not Admin"{
    "message": "Unauthenticated."
}
       * 
       */
      public function destroy(Analysi $Analysi)
      {
          $Analysi->delete();

          return response()->noContent();
      }
    }
    