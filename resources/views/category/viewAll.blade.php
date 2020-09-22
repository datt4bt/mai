
@extends('index')
@section('content')
    <a href="{{ route('category.insert') }}">Add Category</a>
    <table class="table">
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td></td>
            <td></td>

        </tr>

        @foreach($arrayCategory as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>

                <td><a href="{{ route('category.update', ['id'=>$category->id]) }}">Update</a></td>
                <td><a href="{{ route('category.delete', ['id'=>$category->id]) }}">Delete</a></td>
            </tr>
        @endforeach

    </table>
@endsection
