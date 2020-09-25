

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

    <form class="needs-validation" action="{{ route('user.processUpdate', ['id'=>$user->id]) }}" method="get">

        <h1>Update User</h1>
        <input type="hidden" name="email" value="{{ $user->email }}" required><br>
        Name
        <input type="text" name="name" value="{{ $user->name }}" required><br>
                Old Password
        <input type="password" name="oldPassword"  required><br>
        @if (Session::has('error_password'))
            <h5 style="color: red">{{Session::get('error_password')}}</h5>
        @endif
        New Password
        <input type="password" name="newPassword" ><br>

        <input type="submit" name="" value="Update">
    </form>


@endsection



