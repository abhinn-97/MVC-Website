@extends('master')

@section('content')

<div class="row">
 <div class="col-md-12">
  <br />
  <h3 align="center">Work Data</h3>
  <br />
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  <div align="right">
   <a href="{{route('work.create')}}" class="btn btn-primary">Add</a>
   <br />
   <br />
  </div>
  <table class="table table-bordered table-striped">
   <tr>
    <th>Company Name</th>
    <th>Position</th>
    <th>Time (Months)</th>
    <th>Edit</th>
    <th>Delete</th>
   </tr>
   @foreach($work as $row)
   <tr>
    <td>{{$row['Company_Name']}}</td>
    <td>{{$row['Position']}}</td>
    <td>{{$row['Time']}}</td>
    <td><a href="{{action('WorkController@edit', $row['id'])}}" class="btn btn-warning">Edit</a></td>
    <td><form method="post" class="delete_form" action="{{action('WorkController@destroy', $row['id'])}}">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="DELETE" />
      <button type="submit" class="btn btn-danger">Delete</button>
     </form></td>
   </tr>
   @endforeach
  </table>
 </div>
</div>
<script>
$(document).ready(function(){
 $('.delete_form').on('submit', function(){
  if(confirm("Are you sure you want to delete it?"))
  {
   return true;
  }
  else
  {
   return false;
  }
 });
});
</script>
@endsection