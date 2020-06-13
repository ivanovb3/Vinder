<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="{{ url('/css/styleLogReg.css') }}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
<div class="wrapper">
    <div class="box">
    <div class="box_header">
            <h1>Vinder</h1>
            Register below!
        </div>
    <form action="register" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Name. People will see you with this name"> <br>
        @error('name')
        <span class="error">{{$message}}</span>
        <br> 
        @enderror        
        <input type="text" name="email" placeholder="Email"> <br>
        @error('email')
        <span class="error">{{$message}}</span>
        <br> 
        @enderror        
        <input type="password" name="password" placeholder="password"> <br>
        @error('password')
        <span class="error">{{$message}}</span>
        <br> 
        @enderror        
        <input type="password" name="confirmPassword" placeholder="confirm password"> <br>
        @error('confirmPassword')
        <span class="error">{{$message}}</span>
        <br> 
        @enderror        
        <input type="text" name="age" placeholder="age"> <br>
        @error('age')
        <span class="error">{{$message}}</span>
        <br> 
        @enderror
        
        <label for="gender">gender:</label>
        <select id="gender" name="gender"> <br>
        <option value="male">male</option>
        <option value="female">female</option>
         </select> 
         @error('gender')
        <span class="error">{{$message}}</span>
        @enderror
         <br>
         <p>Choose profile picture</p>
         <input type="file" name="img"><br>
         @error('img')
        <span class="error">{{$message}}</span>
        @enderror
         <br> <br>
         <button type="submit">Register</button>
         <br> <br>
         <a href="login">Already have account? Login and start dating!</a>
         
    </form>
    </div>
</div>
</body>
</html>

<style>
.error{
    color:red;
    font-size: x-small;
}
</style>