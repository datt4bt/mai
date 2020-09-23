

@extends('index')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('user.processUpdate', ['id'=>$user->id]) }}" method="get">
        <h1>Update User</h1>
        <input type="hidden" name="email" value="{{ $user->email }}"><br>
        Name
        <input type="text" name="name" value="{{ $user->name }}"><br>
                Old Password
        <input type="password" name="oldPassword" ><br>
        @if (Session::has('error_password'))
            <h5>{{Session::get('error_password')}}</h5>
        @endif
        New Password
        <input type="password" name="newPassword" ><br>

        <input type="submit" name="" value="Update">
    </form>

@endsection



