@extends('layouts.main-layout')

@section('content')

    <h1>Project</h1>
    @foreach ($projects as $project)
        <li>
            <h2>
                {{$project -> name}}
            </h2>
            <img src="{{$project -> image}}" alt="">
            <div>{{$project -> relase_date}}</div>
        </li>
        
    @endforeach
    
@endsection