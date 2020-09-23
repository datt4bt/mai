@extends('index')
@section('content')
    <a href="{{ route('user.insert') }}">Add User</a>
    <table class="table">
        <tr>
            <td>Id</td>
            <td>Username</td>

            <td></td>
            <td></td>
        </tr>

        @foreach($arrayUser as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->email }}</td>
                <td><a href="{{ route('user.update', ['id'=>$user->id]) }}">Update</a></td>
                <td><a href="{{ route('user.delete', ['id'=>$user->id]) }}">Delete</a></td>
            </tr>
        @endforeach

    </table>

@endsection

