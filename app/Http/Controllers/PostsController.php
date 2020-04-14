<?php
    namespace App\Http\Controllers;


    use App\Models\Post;

    class PostsController extends Controller
    {
        public function index()
        {
            $viewData = [
                'records' => Post::simplePaginate(6)
            ];

            return view('posts.index', $viewData);
        }

        public function show($id)
        {
            $viewData = [
                'record' => Post::findOrFail($id)
            ];
            return view('posts.show', $viewData);
        }
    }
