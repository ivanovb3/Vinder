<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="{{ url('/css/styleLogReg.css') }}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<div class="wrapper">
    <div class="box">
        <div class="box_header">
            <h1>Vinder</h1>
            Login below!
        </div>
        <br>

    <form action="login" method="POST" enctype="multipart/form-data">
        @csrf       
        <input type="text" name="email" placeholder="Email">         
        <br> 
        <input type="password" name="password" placeholder="password"> <br>
        <br> <br>
        <button type="submit">Login</button>
        @error('failed')
        <br> <br>
        <span style="color:red">{{$message}}</span>
        @enderror
        <br> <br>
        <a href="register">No account yet? Register and start dating!</a>
         
    </form>

    </div>
</div>
</body>
</html>
