@extends('layouts.admin')


@section('content')
    <h2>User List</h2>

    <div class="actions">
        <a class="green button" href="{{ route('admin.users.create') }}">Create User</a>
    </div>

    <table>
        <tbody>
        @if(!isset($records) || $records->isEmpty())
            <tr>
                <td>No users available for display.</td>
            </tr>
        @else

            @foreach($records as $record)
                <tr>
                    <td class="name">{{ $record->name }}</td>
                    <td class="email">{{ $record->email }}</td>
                    <td class="verified-at">{{ (isset($record->email_verified_at)) ? $record->email_verified_at->format('F d, Y') : '' }}</td>

                    <td class="actions">
                        <a class="button light" href="{{ route('admin.users.edit', $record) }}"><span class="fa fa-pencil"></span></a>

                        @if (Auth::user()->id != $record->id)
                            <form id="frmUserDestroy{{ $record->id}}" name="frmUserDestroy" class="destroy"
                                  method="post" action="{{ route('admin.users.destroy', $record) }}">
                                @method('DELETE')
                                @csrf

                                <button class="red"><span class="fa fa-trash"></span></button>
                            </form>
                        @endif
                    </td>
                </tr>

            @endforeach

        @endif
        </tbody>

        <thead>
        <tr>
            <th class="name">Name</th>
            <th class="email">Email</th>
            <th class="verified-at">Verified At</th>
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
