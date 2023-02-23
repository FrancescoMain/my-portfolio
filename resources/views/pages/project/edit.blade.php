@extends('layouts.main-layout')

@section('content')


    <h1>New Content</h1>

    <form method="POST" action="{{route('admin.project.update' , $project)}}">
        @csrf    
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{$project -> name}}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{$project -> description}}">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">image</label>
            <input type="text" class="form-control" id="image" name="image" value="{{$project -> image}}">
        </div>
        <div class="mb-3">
            <label for="relase_date" class="form-label">relase date</label>
            <input type="date" class="form-control" id="relase_date" name="relase_date" value="{{$project -> relase_date}}">
        </div>  
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    
@endsection