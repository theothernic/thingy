<?php
    namespace App\Http\Controllers;

    class PageController extends Controller
    {
        public function front()
        {
            return app()->call('App\Http\Controllers\PostsController@index');
        }


        public function singlePage()
        {
            return view('singlePage');
        }
    }
