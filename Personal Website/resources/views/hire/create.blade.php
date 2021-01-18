@extends('master')

@section('content')
<div class="row">
 <div class="col-md-12">
  <br />
  <h3 aling="center">Add Skill</h3>
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

  <form method="post" action="{{url('hire')}}">
   {{csrf_field()}}
   <div class="form-group">
    <input type="text" name="Skill_Name" class="form-control" placeholder="Enter Skill Name" />
   </div>
   <div class="form-group">
    <input type="text" name="Skill_Description" class="form-control" placeholder="Enter Skill Description" />
   </div>
   <div class="form-group">
    <input type="text" name="Rate" class="form-control" placeholder="Enter Rate" />
   </div>
   <div class="form-group">
    <input type="submit" class="btn btn-primary" />
   </div>
  </form>
 </div>
</div>
@endsection
