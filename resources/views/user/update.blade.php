<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{ route('user.processUpdate', ['id'=>$user->id]) }}" method="get">
 
    Username
    <input type="text" name="username" value="{{ $user->username }}"><br>
    Password
    <input type="text" name="password" value="{{ $user->password }}"><br>
   
    <input type="submit" name="" value="Update">
</form>
</body>
</html>
