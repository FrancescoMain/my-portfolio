<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Project;

class MainController extends Controller
{


    
    public function home() {
        $projects = Project :: all();

        return view('pages.home' , compact('projects'));
    }

    public function show(Project $project) {

        return view('pages.project.show' , compact('project'));
    }

    public function create() {

        return view('pages.project.create');

    }

    public function store(Request $request ) {
        $data = $request -> validate([
            'name' => 'required|string|max:64|min:3|unique:projects',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'relase_date' => 'required|date|before:today',

        ]);

        $img_path = Storage::put('uploads', $data['image']);
        $data['image'] = $img_path;

        $project = Project :: create($data);

        return redirect() -> route('project.show' ,$project);
        
    }

    public function delete(Project $project) {

        $project -> delete();

        return redirect('/');
         
    }



    public function edit(Project $project) {

        return view("pages.project.edit" , compact('project'));


    }

    public function update (Request $request, Project $project) {
        $data = $request -> validate([
            'name' => 'required|string|max:64|min:3|unique:projects,name,' . $project -> id,
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'relase_date' => 'required|date|before:today',

        ]);

        $img_path = Storage::put('uploads', $data['image']);
        $data['image'] = $img_path;
        $project -> update($data);
        $project -> save();

        return redirect() -> route('project.show' , $project);
    }

    public function privateHome(){
        return view('pages.private-home');
    }
}
