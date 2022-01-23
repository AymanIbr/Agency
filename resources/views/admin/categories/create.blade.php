@extends('admin.layout.master')
@section('content')


<form action="{{route('categories.store')}}" method="POST">
@csrf
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4"> Add New Category</h2>
@include('admin.layout.error')
            <div class="mb-3">
                <input type="text" placeholder="Name" name="name" class="form-control" value="{{old('name')}}">
                </div>
                <button class="btn btn-info px-5">Add</button>
        </div>
    </div>
</div>

</form>

@stop
