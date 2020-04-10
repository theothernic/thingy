@extends('layouts.login')

@section('content')
    @if($errors->any())
    <div class="message warning">
        <h2>Whoops...</h2>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form id="frmLogin" name="frmLogin" method="post" action="{{ route('login') }}">
        @csrf

        <div class="control">
            <label for="txtLoginEmail">Email</label>
            <input type="text" id="txtLoginEmail" name="email" />
        </div>

        <div class="control">
            <label for="txtLoginPass">Password</label>
            <input type="password" id="txtLoginPass" name="password"/>
        </div>


        <button class="primary" type="submit">Log In</button>
        <button class="light" type="reset">Clear</button>
    </form>
@endsection
