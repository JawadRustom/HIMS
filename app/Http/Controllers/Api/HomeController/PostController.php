<?php

namespace App\Http\Controllers\Api\HomeController;

use App\Http\Controllers\Controller;
use App\Http\Resources\HomeResource\Post\Index\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    return PostResource::collection(Post::Where('PostType',$request->postType)->paginate($request->perPage ?? 15));
  }

  /**
   * Display the specified resource.
   */
  public function show(Post $Post)
  {
    return response(['post' => $Post]);
  }
}
