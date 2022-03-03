<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('projects.index', [
            'projects' => Project::latest()->paginate()
        ]);
    }

    public function show(Project $project)
    {
        //return $id;

        return view('projects.show', [
            'project' => $project
        ]);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {

        $valid_fields = request()->validate([
            'title' => 'required',
            'url' => 'required',
            'description' => 'required',
        ]);
        //return request()->only('title', 'url', 'description');
        //Project::create( request()->all() ); // USE THIS OPTION IF THE INPUT FIELDS AND THE DATABASE FIELDS HAVE GOT THE SAME NAME and YOU WANT TO INSERT ALL THE REQUEST (SEE THE PROJECT MODEL FOR MORE SPECIFICATIONS)
        //Project::create( request()->only('title', 'url', 'description') ); // USE THIS OPTION ONLY TO INSERT THE FIELDS YOU STATE
        Project::create( $valid_fields );

        return redirect()->route('projects.index');
    }
}
