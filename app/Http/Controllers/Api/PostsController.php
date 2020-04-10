<?php
    namespace App\Http\Controllers\Api;


    use App\Http\Controllers\Controller;
    use App\Http\Resources\PostCollection;
    use App\Http\Resources\PostResource;
    use App\Models\Post;

    class PostsController extends Controller
    {
        public function index()
        {
            return PostResource::collection(Post::all());
        }
    }
