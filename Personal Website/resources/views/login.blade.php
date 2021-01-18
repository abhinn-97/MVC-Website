<!DOCTYPE html>
<html>
 <head>
  <title>Login</title>
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
  <script>
  function validatelogin()
  {
    var name = document.forms["login"]["name"];               
    var password = document.forms["login"]["password"];  
                        
    if (name.value == "" || password.value == "" )
    {
      if (name.value == "")                                  
      { 
        alert("Please enter your name.");
      } 
      if (password.value == "")                        
      { 
        alert("Please enter your password."); 
      } 
    }    
  return true;
  }
  </script>
 </head>
 <body>
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
      <li><a href="/signup">Sign Up</a></li>
    </ul>
  </div>
</nav>
  <br />
  <div class="container box">
   <h3 align="center">Login</h3><br />

   @if(isset(Auth::user()->email))
    <script>window.location="/main/successlogin";</script>
   @endif

   @if ($message = Session::get('error'))
   <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
   </div>
   @endif

   @if (count($errors) > 0)
    <div class="alert alert-danger">
     <ul>
     @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
     @endforeach
     </ul>
    </div>
   @endif

   <form method="post" action="{{ url('/main/checklogin') }}" name="login" onsubmit="return validatelogin()">
    {{ csrf_field() }}
    <div class="form-group">
     <label>Enter User Name</label>
     <input type="text" name="name" class="form-control" required="" />
    </div>
    <div class="form-group">
     <label>Enter Password</label>
     <input type="password" name="password" class="form-control" required="" />
    </div>
    <div class="form-group">
     <input type="submit" name="login" class="btn btn-primary" value="Login" required="" />
    </div>
   </form>
  </div>
 </body>
</html>