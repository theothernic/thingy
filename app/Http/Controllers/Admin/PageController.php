<?php
    namespace App\Http\Controllers\Admin;


    use App\Http\Controllers\Controller;

    class PageController extends Controller
    {
        public function home()
        {
            return view('admin.home');
        }
    }
