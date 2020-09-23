
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
    <form action="{{ route('user.processInsert') }}" method="post">
        {{csrf_field()}}
        Name
        <input type="text" name="name" id=""><br>
        Email
        <input type="email" name="email" id=""><br>
        Password
        <input type="text" name="password" id=""><br>

        <input type="submit" name="" value="Insert">
    </form>

@endsection


