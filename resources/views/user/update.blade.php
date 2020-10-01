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
        <input type="text" class="form-control" name="name" value="{{ $user->name }}" required><br>
        Password
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="checkbox" id="checkbox" aria-label="Checkbox for following text input">
                </div>
            </div>
            <input type="text" id="password" name="password" style="display:none" class="form-control">
        </div>
        <input type="submit" name="" value="Update">
    </form>


@endsection
@push('js')
    <script src="{{ asset('js/user/delete.js') }}"></script>
@endpush



