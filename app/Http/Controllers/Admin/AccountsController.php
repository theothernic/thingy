<?php
    namespace App\Http\Controllers\Admin;


    use App\Http\Controllers\Controller;

    class AccountsController extends Controller
    {
        public function index()
        {
            $viewData = [];


            return view('admin.accounts.index', $viewData);
        }
    }
