<?php

namespace App\Http\Controllers\Api\HomeController;

use App\Http\Controllers\Controller;
use App\Http\Resources\HomeResource\Post\Index\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

/**
 * @group PostHome
 * 
 * APIs For Posts In Home Page
 */
class PostController extends Controller
{

  /**
   * See all Post
   * @response 200 scenario="Success Process"{
    "data": [
        {
            "post_id": 4,
            "post_title": "Dr.",
            "post_text": "Aut id necessitatibus ducimus. Sit est voluptatum debitis non et. Maxime in ducimus est distinctio aut fugit.",
            "post_type": "Event",
            "Image": null
        },
        {
            "post_id": 6,
            "post_title": "Dr.",
            "post_text": "Reiciendis sit ratione nulla. Architecto tenetur maiores qui. Necessitatibus vitae ducimus recusandae officia error est.",
            "post_type": "Event",
            "Image": null
        },
        {
            "post_id": 7,
            "post_title": "Dr.",
            "post_text": "Sint quas modi aut fuga animi. Quia doloremque aut et aut omnis rerum. Ea consectetur consequuntur autem iste ut.",
            "post_type": "Event",
            "Image": null
        }
    ],
    "links": {
        "first": "http://127.0.0.1:8000/api/Post?page=1",
        "last": "http://127.0.0.1:8000/api/Post?page=2",
        "prev": null,
        "next": "http://127.0.0.1:8000/api/Post?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 2,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/Post?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": "http://127.0.0.1:8000/api/Post?page=2",
                "label": "2",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/Post?page=2",
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://127.0.0.1:8000/api/Post",
        "per_page": 3,
        "to": 3,
        "total": 5
    }
}
   * 
   * 
   * @queryparam perPage int 
   * To return limite data in single page.
   * Defaults value for variable '15'.
   * 
   * 
   * @queryparam postType String required
   * To return Type of post in single page Example ('News','Event').
   */
  public function index(Request $request)
  {
    return PostResource::orderBy('id', 'desc')->collection(Post::Where('PostType', $request->postType)->paginate($request->perPage ?? 15));
  }

  /**
   * See One Post
   * @response 200 scenario="Success Process"{
    "data": {
        "post_id": 12,
        "post_title": "asasssssssssa",
        "post_text": "aassassasasas",
        "post_type": "News",
        "Image": "odksaok"
    }
}
   * 
   * @response 404 scenario="This post not found"{
    "message": "not found"
}
   */
  public function show(Post $Post)
  {
    return new PostResource($Post);
  }
}
