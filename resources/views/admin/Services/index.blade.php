

@extends('admin.layout.master')
@section('content')

<div  class="container-fluid">
<div class="row">
    <div class="col-12">
        <h2 class="mb-4">All Service</h2>
        @if (session('success'))
        <div class="alert alert-{{session('type')}} alert-dismissible fade show">
            {{session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
    @endif
@include('admin.layout.error')
<table class="table">
    <tr class="dark  thead-dark">
        <th>ID</th>
        <th>Welc</th>
        <th>E_Commerce</th>
        <th>Design</th>
        <th>Web</th>
        <th>Careated At</th>
        <th>Action</th>
    </tr>
@foreach ( $services as $service )
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$service->Welc}}</td>
        <td>{{$service->E_Commerce}}</td>
        <td>{{$service->Design}}</td>
        <td>{{$service->Web}}</td>
        <td>{{$service->created_at->format('d - m - Y ')}}</td>
        <td>
            <a class="btn btn-primary btn-sm" href="{{route('services.edit',$service->id)}}"><i class="fas fa-edit"></i></a>
            <form class="d-inline" action="{{route('services.destroy',$service->id)}}" method="POST">
                @csrf
                @method('delete')
                <button onclick="return confirm ('are you sure ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
            </form>
        </td>
    </tr>
@endforeach
</table>
{{$services->links()}}
    </div>
</div>
</div>


@stop
