@extends('master')
@section('page')
<div class="container">
<B class="color">Jailor List</B>
<!--Jailor List will be here-->
<table class="table">
    
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Jailor Name</th>
            <th scope="col">Email</th>
            <th scope="col">Age</th>
            <th scope="col">Gender</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($list as $key=>$data)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$data->jailor_name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->age}}</td>
                <td>{{$data->gender}}</td>
                <td>
                   <a class="btn btn-primary" href="{{route('edit.jailor',$data->id)}}">Edit</a>
                   <a class="btn btn-danger" href="{{route('jailor.delete',$data->id)}}">Delete</a>
                   <a class="btn btn-warning" href="{{route('view.jailor',$data->id)}}">View</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
     {!! $list->links() !!}
    </div>

@stop 