@extends('layouts.admin')


@section('content')
    <h2>Accounts List</h2>

    <div class="actions">
        <a class="green button" href="{{ route('admin.accounts.create') }}">Create Account</a>
    </div>

    <table>
        <tbody>
        @if(!isset($records) || $records->isEmpty())
            <tr>
                <td>No accounts available for display.</td>
            </tr>
        @else

            @foreach($records as $record)
                <tr>
                    <td class="name">{{ ucwords($record->service) }}</td>
                    <td class="email">{{ $record->nickname }}</td>

                    <td class="actions">
                        <a class="button light" href="{{ route('admin.accounts.edit', $record) }}"><span class="fa fa-pencil"></span></a>

                        @if (Auth::user()->id != $record->id)
                            <form id="frmAccountDestroy{{ md5($record->id) }}" name="frmAccountDestroy" class="destroy"
                                  method="post" action="{{ route('admin.accounts.destroy', $record) }}">
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
            <th class="name">Service</th>
            <th class="email">Nickname</th>
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
