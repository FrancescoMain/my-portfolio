<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            'image' => 'required|string|unique:projects',
            'relase_date' => 'required|date|before:today',

        ]);

        $project = Project :: create($data);

        return redirect() -> route('project.show' ,$project);
        
    }

    public function delete(Project $project) {

        $project -> delete();

        return redirect('/');
         
    }

    public function privateHome(){
        return view('pages.private-home');
    }
}
