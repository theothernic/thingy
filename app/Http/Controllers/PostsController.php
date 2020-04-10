<?php
    namespace App\Http\Controllers;


    use App\Models\Post;

    class PostsController extends Controller
    {
        public function index()
        {
            $viewData = [
                'records' => Post::all()
            ];

            return view('posts.index', $viewData);
        }

        public function show()
        {
            $viewData = [];
            return view('posts.show', $viewData);
        }
    }
