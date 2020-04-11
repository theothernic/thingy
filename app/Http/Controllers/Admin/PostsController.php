<?php


namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
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

    public function create()
    {
        $viewData = [
            'record' => new Post()
        ];

        return view('admin.posts.create', $viewData);
    }

    public function edit()
    {
        // TODO: Implement edit() method.
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('admin.posts.index');
    }

    public function show()
    {
        // TODO: Implement show() method.
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

    public function update()
    {
        // TODO: Implement update() method.
    }
}
