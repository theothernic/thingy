@extends('layouts.default')


@section('content')
    <ul class="articles list">
        @if (isset($records))
            @foreach ($records as $record)
                <li>
                    <article id="post-{{ $record->id }}" class="summary">
                        <header>
                            <a href="{{ route('posts.show', $record) }}"><h2 class="title">{{ $record->title }}</a></h2>
                        </header>


                        <section class="body">
                            {!! $record->body !!}
                        </section>

                        <footer>
                            <div>written by {{ (isset($record->author)) ? $record->author->name : 'Unknown' }} on
                                {{ $record->created_at->format('m/d/Y g:i a') }} &blacksquare;
                                <a href="{{ route('posts.show', $record) }}"><span class="fa fa-link"></span> Permalink</a>
                            </div>
                        </footer>
                    </article>
                </li>
            @endforeach
        @else
            <li>No posts available for viewing.</li>
        @endif
    </ul>

    <div class="pagination posts">
        {{ $records->links() }}
    </div>


@endsection
