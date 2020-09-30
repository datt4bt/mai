

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

    <form class="needs-validation" action="{{ route('user.processUpdate', ['id'=>$user->id]) }}" method="post">
        {{csrf_field()}}
        <h1>Update User</h1>
        Name
        <input type="text" name="name" value="{{ $user->name }}" required><br>

        New Password
        <input type="password" name="password" ><br>

        <input type="submit" name="" value="Update">
    </form>


@endsection



