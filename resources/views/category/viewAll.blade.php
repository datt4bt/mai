@extends('index')
@section('content')
    <a href="{{ route('category.insert') }}">Add Category</a>
    <table id="table" class="table">
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td></td>
            <td></td>

        </tr>

        @foreach($arrayCategory as $category)
            <tr  data-id="{{ $category->id }}">
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>

                <td><a  href="{{ route('category.update', ['id'=>$category->id]) }}">Update</a></td>
                <td><a id="{{$category->id}}" onclick="return confirm('Are you sure you want to delete this item?');" class="delete"  href="#">Delete</a></td>
            </tr>

        @endforeach


    </table>


        Name
        <input type="text" name="name" id="name" required><br>
        <input type="submit"  id="submit"  value="Insert">

@endsection
@push('js')

    <script src="{{ asset('js/category/delete.js') }}"></script>
@endpush
