@extends('master')
@section('page')
<div class="container">

<!--alert message-->
@if(session()->has('message'))
    <p class="alert alert-success">{{session()->get('message')}}</p>
@endif

@if($errors->any())
    @foreach($errors->all() as $er)
        <p class="alert alert-danger">{{$er}}</p>
    @endforeach  
@endif

<!--Jailor Form -->
<form method="post" action="{{route('update.visitor',$visitor->id)}}">
@csrf

  <div class="form-group" >
    <label for="visitor_name">Visitor Name</label>
    <input type="text" required name="visitor_name" class="form-control" value="{{$visitor->visitor_name}}"  id="visitor_name" aria-describedby="emailHelp" placeholder="Enter visitor Name">
    
  </div>

  <div class="form-group">
    <label for="nid">Visitor NID</label>
    <input type="text" name="nid" class="form-control" value="{{$visitor->nid}}" id="nid" placeholder="Enter visitor NID">
  </div>

  <div class="form-group">
    <label for="relation">Relation</label>
    <input type="text" name="relation" class="form-control" value="{{$visitor->relation}}" id="relation" placeholder="Relation with prisoner or others">
  </div>

  <div class="form-group">
    <label for="mobile">Visitor Mobile</label>
    <input type="text" name="mobile" class="form-control" value="{{$visitor->mobile}}" id="mobile" placeholder="Enter visitor Mobile Number">
  </div>

  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" name="address" class="form-control" value="{{$visitor->address}}" id="address" placeholder="Enter visitor Address">
  </div>

  <div class="form-group">
    <label for="time">Visiting Time</label>
    <input type="time" name="time" class="form-control" value="{{$visitor->time}}" id="time" placeholder="Enter visiting time">
  </div>

  <div class="form-group">
    <label for="date">Visiting Date</label>
    <input type="date" name="date" class="form-control" value="{{$visitor->date}}" id="date" placeholder="Enter visiting date">
  </div>
   
  <div class="form-group">
      <label for="gender">Gender</label>
      <select id="gender" required name="gender" class="form-control" value="{{$visitor->gender}}"> 
        <option selected>Choose...</option>
        <option>male</option>
        <option>female</option>
      </select>
    </div>

    <div class="form-group">
        <label for="purpose">Visiting Purpose</label>
        <textarea type="text" name="purpose" class="form-control" value="{{$visitor->purpose}}" id="purpose" placeholder="Purpose of Visiting" cols="20" rows="5"></textarea>
      </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@stop