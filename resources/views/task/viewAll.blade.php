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
            <td>Update Status</td>

        </tr>
        <form action="{{route('task.updateStatusAll')}}" method="get">
            @if(isset($page))
                <input type="hidden" name="page" value="{{$page}}">

            @endif
        @foreach($arrayTask as $task)
                    <input type="hidden" name="ids[]" value="{{ $task->id }}">
            <tr  data-id="{{ $task->id }}">
                <td>{{ $task->id }}</td>
                <td>{{ $task->name }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->category->name }}</td>
                <td>
                    <div class="form-check">
                        <input class="checkbox" type="checkbox" name="status" id="{{ $task->id }}" value="1"
                               @if($task->status==1 )
                               checked
                                @endif>

                    </div>
                </td>
                <td><a  href="{{ route('task.update', ['id'=>$task->id]) }}">Update</a></td>
                <td><a id="{{$task->id}}" class="delete" onclick="return confirm('Are you sure you want to delete this item?');"  href="#">Delete</a></td>
                <td>
                    <div class="form-check">
                        <input class="check"  type="checkbox" name="check[]"  value="{{ $task->id }}"
                               @if($task->status==1 )
                               checked
                            @endif>

                    </div>
                </td>
            </tr>

        @endforeach


        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><button class="btn btn-primary" type="submit">Update</button></td>

        </tr>

    </table>
    <div class="d-flex justify-content-center">
        {{ $arrayTask->links( "pagination::bootstrap-4") }}
    </div>
    </form>



@endsection
@push('js')

    <script src="{{ asset('js/task/task.js') }}"></script>
@endpush
