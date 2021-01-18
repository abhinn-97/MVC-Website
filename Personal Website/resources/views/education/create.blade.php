@extends('master')

@section('content')
<div class="row">
 <div class="col-md-12">
  <br />
  <h3 aling="center">Add Education</h3>
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

  <form method="post" action="{{url('education')}}">
   {{csrf_field()}}
   <div class="form-group">
    <input type="text" name="Degree_Name" class="form-control" placeholder="Enter Degree Name" />
   </div>
   <div class="form-group">
    <input type="text" name="School_Name" class="form-control" placeholder="Enter School Name" />
   </div>
   <div class="form-group">
    <input type="text" name="GPA" class="form-control" placeholder="Enter GPA" />
   </div>
   <div class="form-group">
    <input type="submit" class="btn btn-primary" />
   </div>
  </form>
 </div>
</div>
@endsection
