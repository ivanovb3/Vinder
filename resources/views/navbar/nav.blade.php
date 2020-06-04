<html>
    <head>
        <title>Vinder</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
         crossorigin="anonymous"> 
         <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />      
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Vinder</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="/">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="../profile">Profile</a>
      <a class="nav-item nav-link" href="../logout">Logout</a>
    </div>
  </div>
</nav>  
<!--<nav>
  <div class="brand"><h2>Vinder</h2></div>
  <ul>
    <li><a href="/">Home</li>
    <li><a href="../profile">Profile</li>
    <li><a href="../logout">Logout</li>
  </ul>
</nav>  -->
    <div class="content">
        @yield('content')
    </div>
    </body>
</html>

<style>
  .content{
    display: flex;
    height: 100%;
    
  }
</style>