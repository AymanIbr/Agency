@extends('Front.layout.master')
@section('content')

@include('Front.layout.include',[
    'title' => 'Welcome To Home Page',
     'subTitle' => 'I wish you a pleasant tour',
     'bottun'=> 'Find Out More'
]);


@stop

