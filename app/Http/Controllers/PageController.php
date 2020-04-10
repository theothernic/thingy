<?php
    namespace App\Http\Controllers;

    class PageController extends Controller
    {
        public function front()
        {
            return redirect()->route('posts.index');
        }
    }
