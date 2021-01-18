<!DOCTYPE html>

<head>
        <title>User Home Page</title>
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
  <script>
  function validatecontact()
  {
    var name = document.forms["contact"]["name"];              
    var message = document.forms["contact"]["message"];  
    if (name.value == "" || message.value == "" )
    {
      if (name.value == "")                                  
      { 
        window.alert("Please enter your name.");
      } 
      if (message.value == "")                        
      { 
        window.alert("Please enter your message."); 
      } 
    }    
    return true;
   }
                </script>
    <nav class="navbar navbar-inverse col-md-12">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/user_home">Welcome</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="/user_home">Home</a></li>
      <li><a href="/userproject">Projects</a></li>
      <li><a href="/usereducation">Education</a></li>
      <li><a href="/userhire">Hire Me</a></li>
      <li><a href="/userwork">Work Experience</a></li>
      <li><a href="/login">Login</a></li>
      <li><a href="/work">Sign Up</a></li>
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
                <div class="align-middle" style=" margin-top: 200px; margin-left: 450px;">
                        <h1>@if(isset($data))
                            Welcome {{$data}}
                        @else
                            Welcome
                        @endif</h1>
                        <a href="uploads/Abhinn Trivedi.pdf" download>
      <button class="download-button fas fa-download"> Download Resume</button></a>
                </div>
            </div>
            
        </div>
        <div class="container" style="margin-top: 100px;">
          @if( ! session()->has('message'))
        <form method="post" action="{{url('sendemail/send')}}" onsubmit="return validatecontact()">
    {{ csrf_field() }}
    <h1>Contact US</h1>
    <div class="form-group">
     <label>Enter User Name</label>
     <input type="text" name="name" class="form-control" required="" />
    </div>
    <div class="form-group">
     <label>Enter Message</label>
     <input type="message" name="message" class="form-control" required="" />
    </div>
    <div class="form-group">
     <input type="submit" name="sendmail" class="btn btn-primary" value="Contact"  />
    </div>
   </form>
   @endif
   @if(session()->has('message'))
    <strong>Message:</strong> {{session()->get('message')}}
   @endif
 </div>
    </body>
</html>
