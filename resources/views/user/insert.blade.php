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
<form action="{{ route('user.processInsert') }}" method="post">
    {{csrf_field()}}
    Username
    <input type="text" name="username" id=""><br>
    Password
    <input type="text" name="password" id=""><br>
   
    <input type="submit" name="" value="Insert">
</form>
</body>
</html>
