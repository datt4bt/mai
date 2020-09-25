
@extends('index')
@section('content')

    @if (Session::has('error_insert'))
        <div class="alert alert-danger">
            <ul>
               {{Session::get('error_insert')}}
            </ul>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="needs-validation" action="{{ route('task.processInsert') }}" method="post">
        {{csrf_field()}}

        <div class="form-group col-md-6">
            <label for="inputEmail4">Name</label>
            <input type="text" name="name" class="form-control" id="inputEmail4 " required>
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail4">Description</label>
            <textarea name="description"  cols="70%" rows="5"  required></textarea>
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail4">Category</label>
            <select name="id_category" class="custom-select">
                @foreach($arrayCategory as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>

                @endforeach
            </select>
        </div>
        <input type="submit" name="" value="Insert">
    </form>
@endsection

