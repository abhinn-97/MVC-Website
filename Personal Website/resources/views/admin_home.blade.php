<!DOCTYPE html>

<head>
        <title>Admin Home Page</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
    border:1px solid #ccc;
   }
  </style>
</head>
<body>
    <nav class="navbar navbar-inverse col-md-12">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/admin_home">Admin Home Page</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="/admin_home">Home</a></li>
      <li><a href="/people">People</a></li>
      <li><a href="/projects">Projects</a></li>
      <li><a href="/education">Education</a></li>
      <li><a href="/hire">Hire Me</a></li>
      <li><a href="/work">Work Experience</a></li>
    </ul>
  </div>
</nav>
  
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="container">
                <div class="align-middle" style=" margin-top: 200px;">
                        <h1>Welcome to admin page</h1>
                </div>
            </div>
        </div>
    </body>
</html>
