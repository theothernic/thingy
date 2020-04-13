@extends('layouts.admin')


@section('content')
    <h2>Create Account</h2>

    <div class="actions">
        <a class="green button" href="{{ route('admin.users.create') }}">Create User</a>
    </div>

    <div class="twitter">
        <a href="{{ $services['twitter']['authorizeUrl'] }}"><span class="fa fa-twitter-square"></span>
            Add Twitter</a>
    </div>

@endsection
