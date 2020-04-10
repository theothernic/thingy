<?php
    namespace App\Http\Controllers;


    class PostsController extends Controller
    {
        public function index()
        {
            $viewData = [];
            return view('posts.index', $viewData);
        }

        public function show()
        {
            $viewData = [];
            return view('posts.show', $viewData);
        }
    }
