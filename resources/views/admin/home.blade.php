@extends('layouts.admin')


@section('content')
    <h2>Home</h2>

    <div class="user">
        Logged in as {{ Auth::user()->name }}
    </div>

    <div class="actions">
        <a class="green button" href="{{ route('admin.posts.create') }}">Create Post</a>
    </div>



    <form method="post" action="{{ route('logout') }}">
        @csrf
        <button>Log Out</button>
    </form>
@endsection
