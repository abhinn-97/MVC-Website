<!DOCTYPE html>
<html>
 <head>
  <title>Sign Up</title>
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
    var name = document.forms["signup"]["name"]; 
    var email = document.forms["signup"]["email"];               
    var password1 = document.forms["signup"]["password1"];
    var password2 = document.forms["signup"]["password2"];   
                        
    if (name.value == "" || password1.value == "" || email.value == "" || password2.value == "" )
    {
      if (name.value == "")                                  
      { 
        alert("Please enter your name.");
      } 
      if (password1.value == "")                        
      { 
        alert("Please enter your password."); 
      } 
      if (email.value == "")                                  
      { 
        alert("Please enter your email.");
      } 
      if (password2.value == "")                        
      { 
        alert("Please re-enter your password."); 
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
   <h3 align="center">Sign Up</h3><br />

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

   <form method="post" action="{{URL::to('/store')}}">
    {{ csrf_field() }}
    <div class="form-group">
     <label>Enter Name</label>
     <input type="text" name="name" class="form-control" required="" />
    </div>
    <div class="form-group">
     <label>Enter Email </label>
     <input type="text" name="email" class="form-control" required="" />
    </div>
    <div class="form-group">
     <label>Enter Password</label>
     <input type="password" name="password1" class="form-control" required="" />
    </div>
    <div class="form-group">
     <label>Re-Enter Password</label>
     <input type="password" name="password2" class="form-control" required="" />
    </div>
    <div class="form-group">
     <input type="submit" name="login" class="btn btn-primary" value="Sign Up" />
    </div>
   </form>
  </div>
 </body>
</html>