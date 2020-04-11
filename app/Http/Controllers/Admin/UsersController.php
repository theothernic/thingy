<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
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

    }

    public function create()
    {
        $viewData = [
            'record' => new User()
        ];

        return view('admin.users.create', $viewData);
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        if (!$user = User::create($data))
        {
            throw new \Exception('Could not create new user.');
        }

        Return redirect()->route('admin.users.index');
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {
        // TODO: Implement destroy() method.
    }


}
