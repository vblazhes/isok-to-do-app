<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index')->with('projects', $projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'project_name' => 'required',
            'project_slug' => 'required',
            'project_description' => 'required'
        ]);

        $project = new Project;
        $project->name = $request->input('project_name');
        $project->slug = $request->input('project_slug');
        $project->description = $request->input('project_description');

        $project->save();

        return Redirect::route('projects.index')->with('success','Project Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $data = [
            'project' => $project,
            'tasks' => $project->tasks()->paginate(3)
        ];

        return view('projects.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit')->with('project',$project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->validate($request, [
            'project_name' => 'required',
            'project_slug' => 'required',
            'project_description' => 'required'
        ]);

        $project->name = $request->input('project_name');
        $project->slug = $request->input('project_slug');
        $project->description = $request->input('project_description');

        $project->save();

        return Redirect::route('projects.show',$project->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return Redirect::route('projects.index');
    }
}
