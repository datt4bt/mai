
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
    <form class="needs-validation" action="{{ route('category.processUpdate', ['id'=>$category->id]) }}" method="get">

        Username
        <input type="text" name="name" value="{{ $category->name }}" required><br>

        <button type="submit">Update</button>
    </form>
@endsection
