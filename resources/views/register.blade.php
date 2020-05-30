<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
<div class="wrapper">
    <form action="register" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Name"> <br>
        @error('name')
        <span style="color:red">{{$message}}</span>
        @enderror
        <br> <br>
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
        <input type="password" name="confirmPassword" placeholder="confirm password"> <br>
        @error('confirmPassword')
        <span style="color:red">{{$message}}</span>
        @enderror
        <br> <br>
        <input type="text" name="age" placeholder="age"> <br>
        @error('age')
        <span style="color:red">{{$message}}</span>
        @enderror
        <br> <br>
        <label for="gender">gender:</label>
        <select id="gender" name="gender"> <br>
        <option value="male">male</option>
        <option value="female">female</option>
         </select> 
         @error('gender')
        <span style="color:red">{{$message}}</span>
        @enderror
         <br> <br>
         <input type="file" name="img"> <br>
         @error('img')
        <span style="color:red">{{$message}}</span>
        @enderror
         <br> <br>
         <button type="submit">Register</button>
         
    </form>
</div>
</body>
</html>
<style type=”text/css”>

</style>