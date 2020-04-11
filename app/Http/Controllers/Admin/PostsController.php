<?php


namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    public function index()
    {
        $viewData = [
            'records' => Post::paginate(6)
        ];

        return view('admin.posts.index', $viewData);
    }

    public function show($id)
    {
        $viewData = [
            'record' => Post::findOrFail($id)
        ];

        return view('admin.posts.show', $viewData);
    }

    public function create()
    {
        $viewData = [
            'record' => new Post()
        ];

        return view('admin.posts.create', $viewData);
    }

    public function store(StorePostRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;

        if (!$record = Post::create($data))
        {
            throw new \Exception('Could not create post.');
        }

        return redirect()->route('admin.posts.index');


    }

    public function edit($id)
    {
        $viewData = [
            'record' => Post::findOrFail($id)
        ];

        return view('admin.posts.edit', $viewData);
    }

    public function update(UpdatePostRequest $request, $id)
    {
        $data = $request->validated();

        if (!Post::findOrFail($id)->update($data))
        {
            throw new \Exception('Could not complete the editing action for this post.');
        }


        return redirect()->route('admin.posts.index');
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('admin.posts.index');
    }






}
