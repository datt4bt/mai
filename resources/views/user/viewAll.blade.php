@extends('index')
@section('content')
    <a href="{{ route('user.insert') }}">Add User</a>
    <table id="table" class="table">
        <tr>
            <td>Id</td>
            <td>Username</td>
            <td></td>

        </tr>

        @foreach($arrayUser as $user)
            <tr data-id="{{ $user->id }}">
                <td>{{ $user->id }}</td>
                <td>{{ $user->email }}</td>
                <td><a href="{{ route('user.update', ['id'=>$user->id]) }}">Update</a></td>

            </tr>
        @endforeach

    </table>

@endsection
@push('js')

    <script src="{{ asset('js/user/delete.js') }}"></script>
@endpush

