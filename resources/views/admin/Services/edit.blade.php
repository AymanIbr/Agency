@extends('admin.layout.master')
@section('content')


<form action="{{route('services.update',$service->id)}}" method="POST">
@csrf
@method('put')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4"> Update Service</h2>
@include('admin.layout.error')
<div class="mb-3">
    <input type="text" placeholder="Welcome" name="Welc" class="form-control" value="{{$service->Welc}}">
    </div>
    <div class="mb-3">
        <input type="text" placeholder="E_Commerce" name="E_Commerce" class="form-control" value="{{$service->E_Commerce}}">
        </div>
        <div class="mb-3">
            <input type="text" placeholder="Design" name="Design" class="form-control" value="{{$service->Design}}">
            </div>
            <div class="mb-3">
                <input type="text" placeholder="Web" name="Web" class="form-control" value="{{$service->Web}}">
                </div>
                <button class="btn btn-success px-5">Update</button>
        </div>
    </div>
</div>

</form>

@stop
