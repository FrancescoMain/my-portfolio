@extends('layouts.main-layout')

@section('content')

    <h1>Project: {{$project -> name}}</h1>
    <img src="{{$project -> image}}" alt="">
    <div>{{$project -> description}}</div>
    <div>{{$project -> relase_date}}</div>

    @auth
        
    <a href="{{route('admin.project.delete', $project)}}">DELETE</a>
    @endauth


    
@endsection