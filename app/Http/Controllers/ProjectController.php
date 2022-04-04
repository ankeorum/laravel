<?php

namespace App\Http\Controllers;

use App\Events\ProjectSaved;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\SaveProjectRequest;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\image;

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
            'newProject' => new Project,
            'projects' => Project::with('category')->latest()->paginate(),
            'deletedProjects' => Project::onlyTrashed()->get()
        ]);
    }

    public function show(Project $project)
    {
        // return $id;

        return view('projects.show', [
            'project' => $project->load('category')
        ]);
    }

    public function create()
    {
        $this->authorize('create', $project = new Project);

        return view('projects.create',[
            'project' => $project,
            'categories' => Category::pluck('name', 'id'),
        ]);

    }

    public function store(SaveProjectRequest $request)
    {
        //return request()->only('title', 'url', 'description');
        //Project::create( request()->all() ); // USE THIS OPTION IF THE INPUT FIELDS AND THE DATABASE FIELDS HAVE GOT THE SAME NAME and YOU WANT TO INSERT ALL THE REQUEST (SEE THE PROJECT MODEL FOR MORE SPECIFICATIONS)
        //Project::create( request()->only('title', 'url', 'description') ); // USE THIS OPTION ONLY TO INSERT THE FIELDS YOU STATE

        $this->authorize('create', $project = new Project); //AuthServiceProvider.php allows or not depending on the rules defined there

        $project = New Project ( $request->validated() );
        $project->image = $request->file('image')->store('images');
        $project->save();

        // ProjectSaved event
        ProjectSaved::dispatch($project);
        // optimize image with intervention/image

        return redirect()->route('projects.index')->with('status', 'New project created successfully');
    }

    public function edit(Project $project)
    {

        $this->authorize('update', $project);

        return view('projects.edit', [
            'project' => $project,
            'categories' => Category::pluck('name', 'id'),
        ]);
    }

    public function update(Project $project, SaveProjectRequest $request)
    {
        $this->authorize('update', $project);
        // return $request->validated();
        if( $request->hasFile('image') )
        {
            Storage::delete($project->image);
            $project = $project->fill( $request->validated() );
            $project->image = $request->file('image')->store('images');
            $project->save();

            // ProjectSaved event
            ProjectSaved::dispatch($project);
        }
        else
        {
            $project->update( array_filter($request->validated()) );
        }

        //return request()->only('title', 'url', 'description');
        //Project::create( request()->all() ); // USE THIS OPTION IF THE INPUT FIELDS AND THE DATABASE FIELDS HAVE GOT THE SAME NAME and YOU WANT TO INSERT ALL THE REQUEST (SEE THE PROJECT MODEL FOR MORE SPECIFICATIONS)
        //Project::create( request()->only('title', 'url', 'description') ); // USE THIS OPTION ONLY TO INSERT THE FIELDS YOU STATE
        // Project::create( $request->validated() );

        return redirect()->route('projects.show', $project)->with('status', 'Project updated successfully');
    }
    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);
        $project->delete();

        return redirect()->route('projects.index')->with('status', 'Project removed successfully');
    }

    public function restore($projectUrl)
    {
        $project = Project::withTrashed()->whereUrl($projectUrl)->firstOrFail();
        $this->authorize('restore', $project);
        $project->restore();

        return redirect()->route('projects.index')->with('status', 'Project restored successfully');
    }

    public function forceDelete($projectUrl)
    {
        $project = Project::withTrashed()->whereUrl($projectUrl)->firstOrFail();
        $this->authorize('forceDelete', $project);


        Storage::delete($project->image);
        $project->forceDelete();

        return redirect()->route('projects.index')->with('status', 'Project removed permanently');
    }
}
