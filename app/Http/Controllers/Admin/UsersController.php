<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $viewData = [
            'records' => User::paginate(6)
        ];

        return view('admin.users.index', $viewData);
    }

    public function show()
    {
        // TODO: implement show method
    }

    public function create()
    {
        $viewData = [
            'record' => new User()
        ];

        return view('admin.users.create', $viewData);
    }

    /**
     * @param StoreUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        if (!$user = User::create($data))
        {
            throw new \Exception('Could not create new user.');
        }

        Return redirect()->route('admin.users.index');
    }

    public function edit($id)
    {
        $viewData = [
            'record' => User::findOrFail($id)
        ];

        return view('admin.users.edit', $viewData);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $data = $request->validated();

        if (!User::findOrFail($id)->update($data))
        {
            throw new \Exception('Could not complete the editing action for this post.');
        }


        return redirect()->route('admin.users.index');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('admin.users.index');
    }


}
