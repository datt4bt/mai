@extends('index')
@section('content')
    @if (Session::has('error_update'))
        <div class="alert alert-danger">
            <ul>
                {{Session::get('error_update')}}
            </ul>
        </div>
    @endif
    <a href="{{ route('task.insert') }}">Add Task</a>
    <table id="table" class="table">
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Description</td>
            <td>Category</td>
            <td>Finished</td>
            <td></td>
            <td></td>

        </tr>

        @foreach($arrayTask as $task)
            <tr  data-id="{{ $task->id }}">
                <td>{{ $task->id }}</td>
                <td>{{ $task->name }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->category->name }}</td>
                <td>
                    <div class="form-check">
                        <input class="checkbox" type="checkbox" name="status" id="{{ $task->id }}" value="0"
                               @if($task->status==0 )
                               checked
                                @endif>

                    </div>
                </td>
                <td><a  href="{{ route('task.update', ['id'=>$task->id]) }}">Update</a></td>
                <td><a id="{{$task->id}}" class="delete"  href="#">Delete</a></td>
            </tr>

        @endforeach


    </table>




@endsection
@push('js')

    <script src="{{ asset('js/task/task.js') }}"></script>
@endpush
