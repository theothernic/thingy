<?php
    namespace App\Http\Controllers;


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
