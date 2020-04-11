@extends('layouts.admin')


@section('content')
    <h2>Post: {{ $record->title }}</h2>

    <div class="actions">
        <a class="button light" href="{{ route('admin.posts.edit', $record) }}">Edit</a>
    </div>

    <article>
        <h2>{{ $record->title }}</h2>

        <section class="body">
            {!! $record->body !!}
        </section>
    </article>
@endsection
