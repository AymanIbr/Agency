@extends('admin.layout.master')
@section('content')


<form action="{{route('teams.update',$team->id)}}" method="POST" enctype="multipart/form-data">
@csrf
@method('put')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4"> Update Member</h2>
@include('admin.layout.error')
<div class="mb-3">
    <input type="text" placeholder="Name" name="name" class="form-control" value="{{$team->name}}">
    </div>
    <div class="mb-3">
        <label>Image</label>
        <input type="file" name="image" class="form-control">
        <img class="mt-1" width="80" src="{{asset('uplods/'.$team->image)}}" alt="">
        </div>
        <div class="mb-3">
            <input type="text" placeholder="Job" name="job" class="form-control" value="{{$team->job}}">
            </div>
                <button class="btn btn-success px-5">Update</button>
        </div>
    </div>
</div>

</form>

@stop
