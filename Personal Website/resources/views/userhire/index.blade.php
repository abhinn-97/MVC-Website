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
<div class="row">
 <div class="col-md-12">
  <br />
  <h3 align="center">Skill Data</h3>
  <br />
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif>
  <table class="table table-bordered table-striped">
   <tr>
    <th>Skill Name</th>
    <th>Skill Description</th>
    <th>Rate</th>
   </tr>
   @foreach($hire as $row)
   <tr>
    <td>{{$row['Skill_Name']}}</td>
    <td>{{$row['Skill_Description']}}</td>
    <td>{{$row['Rate']}}</td>
     </form></td>
   </tr>
   @endforeach
  </table>
 </div>
</div>
</script>
</body>