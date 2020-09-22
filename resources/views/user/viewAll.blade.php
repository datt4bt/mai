<table border="1">
    <tr>
        <td>Id</td>
        <td>Username</td>
        <td>Password</td>
        <td></td>
        <td></td>
    </tr>
  
        @foreach($arrayUser as $user)
    <tr> 
        <td>{{ $user->id }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->password }}</td>
        <td><a href="{{ route('user.update', ['id'=>$user->id]) }}">Update</a></td>
        <td><a href="{{ route('user.delete', ['id'=>$user->id]) }}">Delete</a></td>
    </tr>
        @endforeach
   
</table>