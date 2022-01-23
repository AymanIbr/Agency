@extends('admin.layout.master')
@section('content')


<form action="{{route('teams.store')}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4"> Add New Member</h2>
@include('admin.layout.error')
            <div class="mb-3">
                <input type="text" placeholder="Name" name="name" class="form-control" value="{{old('name')}}">
                </div>
                <div class="mb-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="text" placeholder="Job" name="job" class="form-control" value="{{old('job')}}">
                        </div>
                <button class="btn btn-info px-5">Add</button>
        </div>
    </div>
</div>

</form>

@stop
