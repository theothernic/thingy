@extends('layouts.admin')


@section('content')
    <h2>Create Account</h2>

    <div class="twitter">
        <a class="button" href="{{ $services['twitter']['authorizeUrl'] }}"><span class="fa fa-twitter-square"></span>
            Add Twitter</a>
    </div>

@endsection
