@extends('layouts.admin')


@section('content')
    <h2>Home</h2>

    <div class="user">
        Logged in as {{ Auth::user()->name }}
    </div>



    <form method="post" action="{{ route('logout') }}">
        @csrf
        <button>Log Out</button>
    </form>
@endsection
