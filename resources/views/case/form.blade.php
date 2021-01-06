@extends('master')
@section('page')
<div class="container">
<h1>Prisoner Case Form</h1>
<!--alert message-->
@if(session()->has('message'))
    <p class="alert alert-success">{{session()->get('message')}}</p>
@endif

@if($errors->any())
    @foreach($errors->all() as $er)
        <p class="alert alert-danger">{{$er}}</p>
    @endforeach  
@endif
<!-- Prisoner Case Form-->
    <form method="post" action="{{route('case.form')}}">
        @csrf
          <div class="form-group" >
            <label for="name">Case Name</label>
            <input type="text" required name="name" class="form-control" value="{{old('name')}}"  id="name" aria-describedby="emailHelp" placeholder="Enter your name">
            
          </div>
          
          <div class="form-group">
            <label for="details">Case Details</label>
            <textarea type="text" name="details" class="form-control" value="{{old('details')}}" id="details" placeholder="Case Details" cols="20" rows="5"></textarea>
          </div>
           
          <div class="form-group">
              <label for="status">Case Status</label>
              <select id="status" required name="status"  class="form-control"> value="{{old('status')}}"
                <option selected>Choose...</option>
                <option>Active</option>
                <option>Inactive</option>
              </select>
            </div>
        
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

@stop