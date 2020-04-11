@extends('layouts.admin')


@section('page.actions')
    <div class="actions">
        <button class="green"><span class="fa fa-floppy-o"></span> Save</button>
    </div>
@endsection

@section('content')
    <h2>Create Post</h2>

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


    <form id="frmPostCreate" name="frmPostCreate" method="post" action="{{ route('admin.posts.store') }}">
        @csrf

        @yield('page.actions')

        <div class="control">
            <label for="txtPostTitle">Title</label>
            <input type="text" id="txtPostTitle" name="title" />
        </div>

        <div class="control">
            <label for="txtPostTitle">Post</label>
            <div>&nbsp;</div>
            @include('common.controls.editor', ['id' => 'txtPostBody', 'name' => 'body'])
        </div>

        @yield('page.actions')
    </form>
@endsection
