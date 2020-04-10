@extends('layouts.default')


@section('content')
    <ul class="articles list">
        @if (isset($records))
            @foreach ($records as $record)
                <li>
                    <article id="post-{{ $record->id }}">
                        <h2 class="title">{{ $record->title }}</h2>

                        <section class="body">
                            {!! $record->body !!}
                        </section>

                        <footer>
                            <div>written by {{ (isset($record->author)) ? $record->author->name : 'Unknown' }},
                                {{ $record->created_at->format('m/d/Y g:i a') }}</div>
                        </footer>
                    </article>
                </li>
            @endforeach
        @else
            <li>No posts available for viewing.</li>
        @endif
    </ul>

@endsection
