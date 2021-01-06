@extends('master')
@section('page')
<div class="container">
<h1>Visitors List</h1>
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
<table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Visitor Name</th>
            <th scope="col">Visitor NID</th>
            <th scope="col">Relation</th>
            <th scope="col">Mobile Number</th>
            <th scope="col">Visitor Address</th>
            <th scope="col">Visiting Time</th>
            <th scope="col">Visiting Date</th>
            <th scope="col">Gender</th>
            <th scope="col">Visiting Purpose</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($list as $key=>$data)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$data->visitor_name}}</td>
                <td>{{$data->nid}}</td>
                <td>{{$data->relation}}</td>
                <td>{{$data->mobile}}</td>
                <td>{{$data->address}}</td>
                <td>{{$data->time}}</td>
                <td>{{$data->date}}</td>
                <td>{{$data->gender}}</td>
                <td>{{$data->purpose}}</td>
                <td>
                   <a class="btn btn-primary" href="{{route('edit.visitor',$data->id)}}">Edit</a>
                   <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')" href="{{route('delete.visitor',$data->id)}}">Delete</a>
                   <a class="btn btn-warning" href="{{route('view.visitor',$data->id)}}">View</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
     {!! $list->links() !!}
    </div>

@stop