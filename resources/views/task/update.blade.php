
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
    <form class="needs-validation" action="{{ route('task.processUpdate', ['id'=>$task->id]) }}" method="get">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Name</label>
            <input type="text" name="name" class="form-control" value="{{$task->name}}" id="inputEmail4 " required>
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail4">Description</label>
            <textarea name="description"  cols="70%" rows="5"  required>{{$task->description}}</textarea>
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail4">Category</label>
            <select name="id_category" class="custom-select">
                @foreach($arrayCategory as $category)
                    <option value="{{$category->id}}"
                    @if ($task->id_category==$category->id)
                        selected
                    @endif

                    >{{$category->name}}</option>

                @endforeach
            </select>
        </div>
        <input type="submit" name="" value="Insert">
    </form>
@endsection
