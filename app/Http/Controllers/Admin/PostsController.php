<?php


namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;
use App\Http\Controllers\IResourceController;
use App\Models\Post;

class PostsController extends Controller implements IResourceController
{

    public function index()
    {
        $viewData = [
            'records' => Post::all()
        ];


        return view('admin.posts.index');
    }

    public function create()
    {
        $viewData = [
            'record' => new Post()
        ];

        return view('admin.posts.create');
    }

    public function edit()
    {
        // TODO: Implement edit() method.
    }

    public function destroy()
    {
        // TODO: Implement destroy() method.
    }

    public function show()
    {
        // TODO: Implement show() method.
    }

    public function store()
    {
        // TODO: Implement store() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }
}
