@extends('master')
@section('page')
<div class="container">
<B class="color">Case List</B>
<!--Prisoner Case List will be here-->
<table class="table">
    
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Case Name</th>
            <th scope="col">Case Details</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($list as $key=>$data)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$data->name}}</td>
                <td>{{$data->details}}</td>
                <td>{{$data->status}}</td>
                <td>
                   <a class="btn btn-primary" href="{{route('edit.jailor',$data->id)}}">Edit</a>
                   <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('jailor.delete',$data->id)}}">Delete</a>
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