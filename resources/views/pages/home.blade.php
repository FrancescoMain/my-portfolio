@extends('layouts.main-layout')

@section('content')
    <h1>Project</h1>

    @auth
    <a href="{{route('admin.project.create')}}">CREATE NEW PROJECT</a>
        
    @endauth

    @foreach ($projects as $project)
        <li>
            <a href="{{route('project.show' , $project)}}">
                <h2>
                    {{$project -> name}}
                </h2>
                <img src="{{asset('storage/' . $project -> image)}}" alt="">
                <div>{{$project -> relase_date}}</div>
            </a>

        </li>
        
    @endforeach
    
@endsection