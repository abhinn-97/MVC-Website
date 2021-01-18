@extends('master')

@section('content')
<div class="row">
 <div class="col-md-12">
  <br />
  <h3 aling="center">Add Data</h3>
  <br />
  @if(count($errors) > 0)
  <div class="alert alert-danger">
   <ul>
   @foreach($errors->all() as $error)
    <li>{{$error}}</li>
   @endforeach
   </ul>
  </div>
  @endif
  @if(\Session::has('success'))
  <div class="alert alert-success">
   <p>{{ \Session::get('success') }}</p>
  </div>
  @endif

  <form method="post" action="{{url('people')}}">
   {{csrf_field()}}
   <div class="form-group">
    <input type="text" name="fname" class="form-control" placeholder="Enter First Name" />
   </div>
   <div class="form-group">
    <input type="text" name="lname" class="form-control" placeholder="Enter Last Name" />
   </div>
   <div class="form-group">
    <div class="form-group">
    <input type="text" name="uname" class="form-control" placeholder="Enter User Name" />
   </div>
   <div class="form-group">
    <input type="text" name="email" class="form-control" placeholder="Enter Email" />
   </div>
   <div class="form-group">
    <input type="password" name="pass" class="form-control" placeholder="Enter pass" />
   </div>
   <div class="form-group">
    <input type="submit" class="btn btn-primary" />
   </div>
  </form>
 </div>
</div>
@endsection
