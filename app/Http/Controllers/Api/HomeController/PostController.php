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
            "post_id": 1,
            "post_title": "Dr.",
            "post_text": "Quia et nihil possimus rerum. Dolor aut quo ut voluptates facilis. Quis voluptatem quod alias. Accusamus a provident voluptatum molestias et quae doloremque quo. Provident voluptatem minima quia.",
            "post_type": "Event"
        },
        {
            "post_id": 2,
            "post_title": "Ms.",
            "post_text": "Repellendus et explicabo sequi unde. Rerum consequatur aut excepturi inventore quo. Ut sint adipisci nostrum blanditiis. Qui qui et odio iusto repellat quas voluptate.",
            "post_type": "Event"
        },
        {
            "post_id": 3,
            "post_title": "Dr.",
            "post_text": "Quo et et velit non earum beatae. A et facere occaecati. Tempore sed odit voluptatem recusandae.",
            "post_type": "Event"
        }
    ],
    "links": {
        "first": "http://127.0.0.1:8000/api/Post?page=1",
        "last": "http://127.0.0.1:8000/api/Post?page=3",
        "prev": null,
        "next": "http://127.0.0.1:8000/api/Post?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 3,
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
                "url": "http://127.0.0.1:8000/api/Post?page=3",
                "label": "3",
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
        "total": 7
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
    return PostResource::collection(Post::Where('PostType', $request->postType)->paginate($request->perPage ?? 15));
  }

  /**
   * See One Post
   * @response 200 scenario="Success Process"{
    "data": {
        "post_id": 1,
        "post_title": "Dr.",
        "post_text": "Quia et nihil possimus rerum. Dolor aut quo ut voluptates facilis. Quis voluptatem quod alias. Accusamus a provident voluptatum molestias et quae doloremque quo. Provident voluptatem minima quia.",
        "post_type": "Event"
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
