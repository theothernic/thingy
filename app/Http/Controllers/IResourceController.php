<?php
    namespace App\Http\Controllers\Admin;


    interface IResourceController
    {
        public function index();
        public function create();
        public function edit();
        public function destroy();
        public function show();
        public function store();
        public function update();
    }
