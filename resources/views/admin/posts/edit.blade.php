@extends('layouts.admin')


@section('content')
    <h2>Edit Post</h2>

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


    <form id="frmPostCreate" name="frmPostCreate" method="post" action="{{ route('admin.posts.update', $record) }}">
        @method('PUT')
        @csrf

        <div class="control">
            <label for="txtPostTitle">Title</label>
            <input type="text" id="txtPostTitle" name="title" value="{{ $record->title }}"/>
        </div>

        <div class="control">
            <label for="txtPostTitle">Post</label>
            <div>&nbsp;</div>
            @include('common.controls.editor', ['id' => 'txtPostBody', 'name' => 'body', 'value' => $record->body])
        </div>

        <div class="actions">
            <button class="green"><span class="fa fa-floppy-o"></span> Save</button>
        </div>
    </form>
@endsection
