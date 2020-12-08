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

<!--Prisoner Form -->
<form method="post" action="{{route('cell.form')}}">
@csrf
  <div class="form-group" >
    <label for="jailor_name">Cell Name</label>
    <input type="text" required name="jailor_name" class="form-control" value="{{old('jailor_name')}}"  id="jailor_name" aria-describedby="emailHelp" placeholder="Enter Cell Name">
    
  </div>


  <div class="form-group">
    <label for="age">Status</label>
    <select id="status" required name="status" class="form-control">
      <option selected>Choose...</option>
      <option>Active</option>
      <option>Inactive</option>
    </select>
  </div>
  
   
  <div class="form-group">
      <label for="cell_type">Cell Type</label>
      <select id="cell_type" required name="cell_type" class="form-control">
        <option selected>Choose...</option>
        <option>Ward cell</option>
        <option>Medical cell</option>
        <option>Normal cell</option>
      </select>
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <textarea type="text" name="description" class="form-control" id="description" placeholder="Enter Cell Description" cols="10" rows="5"></textarea>
    </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@stop