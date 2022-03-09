<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct()
    {
        //This method allows a route for auth users
        $this->middleware('auth')->only('create', 'edit', 'destroy');
        //This methos allows routes for non-auth users
        $this->middleware('auth')->except('index', 'show');
    }
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
        return view('projects.create',[
            'project' => new Project
        ]);
    }

    public function store(SaveProjectRequest $request)
    {

        //return request()->only('title', 'url', 'description');
        //Project::create( request()->all() ); // USE THIS OPTION IF THE INPUT FIELDS AND THE DATABASE FIELDS HAVE GOT THE SAME NAME and YOU WANT TO INSERT ALL THE REQUEST (SEE THE PROJECT MODEL FOR MORE SPECIFICATIONS)
        //Project::create( request()->only('title', 'url', 'description') ); // USE THIS OPTION ONLY TO INSERT THE FIELDS YOU STATE
        Project::create( $request->validated() );

        return redirect()->route('projects.index')->with('status', 'New project created successfully');
    }

    public function edit(Project $project)
    {

        return view('projects.edit', [
            'project' => $project
        ]);
    }

    public function update(Project $project, SaveProjectRequest $request)
    {
        $project->update( $request->validated() );
        //return request()->only('title', 'url', 'description');
        //Project::create( request()->all() ); // USE THIS OPTION IF THE INPUT FIELDS AND THE DATABASE FIELDS HAVE GOT THE SAME NAME and YOU WANT TO INSERT ALL THE REQUEST (SEE THE PROJECT MODEL FOR MORE SPECIFICATIONS)
        //Project::create( request()->only('title', 'url', 'description') ); // USE THIS OPTION ONLY TO INSERT THE FIELDS YOU STATE
        // Project::create( $request->validated() );

        return redirect()->route('projects.show', $project)->with('status', 'Project updated successfully');
    }
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('status', 'Project removed successfully');;
    }
}
