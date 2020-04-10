@extends('layouts.default')


@section('content')
    <article id="post-{{ $record->id }}" class="single">
        <a href="{{ route('posts.show', $record) }}"><h2 class="title">{{ $record->title }}</a></h2>

        <section class="body">
            {!! $record->body !!}
        </section>

        <footer>
            <div>written by {{ (isset($record->author)) ? $record->author->name : 'Unknown' }},
                {{ $record->created_at->format('m/d/Y g:i a') }}</div>
        </footer>
    </article>
@endsection
