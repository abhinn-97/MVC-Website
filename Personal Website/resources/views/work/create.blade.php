@extends('master')

@section('content')
<div class="row">
 <div class="col-md-12">
  <br />
  <h3 aling="center">Add Work</h3>
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

  <form method="post" action="{{url('work')}}">
   {{csrf_field()}}
   <div class="form-group">
    <input type="text" name="Company_Name" class="form-control" placeholder="Enter Company Name" />
   </div>
   <div class="form-group">
    <input type="text" name="Position" class="form-control" placeholder="Enter Position " />
   </div>
   <div class="form-group">
    <input type="text" name="Time" class="form-control" placeholder="Enter Time" />
   </div>
   <div class="form-group">
    <input type="submit" class="btn btn-primary" />
   </div>
  </form>
 </div>
</div>
@endsection
