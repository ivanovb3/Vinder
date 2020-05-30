<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<div class="wrapper">
    <form action="login" method="POST" enctype="multipart/form-data">
        @csrf       
        <input type="text" name="email" placeholder="Email"> <br>
        @error('email')
        <span style="color:red">{{$message}}</span>
        @enderror
        <br> <br>
        <input type="password" name="password" placeholder="password"> <br>
        @error('password')
        <span style="color:red">{{$message}}</span>
        @enderror
        <br> <br>
        <button type="submit">Login</button>
         
    </form>
</div>
</body>
</html>