@extends('admin.layout.master')
@section('content')


<form action="{{route('services.store')}}" method="POST">
@csrf
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4"> Add New Service</h2>
@include('admin.layout.error')
            <div class="mb-3">
                <input type="text" placeholder="Welcome" name="Welc" class="form-control" value="{{old('Welc')}}">
                </div>
                <div class="mb-3">
                    <input type="text" placeholder="E_Commerce" name="E_Commerce" class="form-control" value="{{old('Welc')}}">
                    </div>
                    <div class="mb-3">
                        <input type="text" placeholder="Design" name="Design" class="form-control" value="{{old('Design')}}">
                        </div>
                        <div class="mb-3">
                            <input type="text" placeholder="Web" name="Web" class="form-control" value="{{old('Web')}}">
                            </div>
                <button class="btn btn-info px-5">Add</button>
        </div>
    </div>
</div>

</form>

@stop
