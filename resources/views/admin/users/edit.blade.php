@extends('layouts.admin')

@section('page.actions')
    <div class="actions">
        <button class="green"><span class="fa fa-floppy-o"></span> Save</button>
    </div>
@endsection

@section('content')
    <h2>Create User</h2>

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


    <form id="frmUserEdit" name="frmUserEdit" method="post" action="{{ route('admin.users.update', $record) }}">
        @method('PUT')
        @csrf

        @yield('page.actions')

        <fieldset>
            <legend>User Details</legend>

            <div class="control">
                <label for="txtUserName">Name</label>
                <input type="text" id="txtUserName" name="name" value="{{ $record->name }}"/>
            </div>

            <div class="control">
                <label for="txtUserEmail">Email</label>
                <input type="text" id="txtUserName" name="email" value="{{ $record->email }}"/>
            </div>

            <div class="control">
                <label for="txtUserEmailConfirm">Confirm email</label>
                <input type="text" id="txtUserEmailConfirm" name="email_confirmation" />
            </div>
        </fieldset>


        <fieldset>
            <legend>Password</legend>
            <div class="control">
                <label for="txtNewUserPass">Password</label>
                <input type="password" id="txtNewUserPass" name="password" />
            </div>
            <div class="control">
                <label for="txtNewUserPassConfirm">Confirm password</label>
                <input type="password" id="txtNewUserPassConfirm" name="password_confirmation" />
            </div>
        </fieldset>

        @yield('page.actions')
    </form>
@endsection
