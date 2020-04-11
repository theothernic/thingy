@extends('layouts.admin')


@section('content')
    <h2>Post List</h2>

    <table>
        <tbody>
        @if(!isset($records) || $records->isEmpty())
            <tr>
                <td>No posts available for display.</td>
            </tr>
        @else

            @foreach($records as $record)
                <tr>
                    <td class="title">{{ $record->title }}</td>
                    <td class="author">{{ $record->author->name }}</td>
                    <td class="post-date">{{ $record->created_at->format('D, M d Y, g:ia') }}</td>

                    <td class="actions">
                        <a class="button light" href="{{ route('admin.posts.show', $record) }}"><span class="fa fa-search"></span></a>
                        <form id="frmPostDestroy{{ $record->id}}" name="frmPostDestroy" class="destroy"
                              method="post" action="{{ route('admin.posts.destroy', $record) }}">
                            @method('DELETE')
                            @csrf

                            <button class="red"><span class="fa fa-trash"></span></button>
                        </form>
                    </td>
                </tr>

            @endforeach

        @endif
        </tbody>

        <thead>
            <tr>
                <th class="title">Title</th>
                <th class="author">Author</th>
                <th class="post-date">Post Date</th>
                <th class="actions">&nbsp;</th>
            </tr>
        </thead>
    </table>

    @if (isset($records) || !$records->isEmpty())
    <div class="pagination">
        {{ $records->links() }}
    </div>


`   @endif

@endsection
