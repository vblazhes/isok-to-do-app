<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        return view('tasks.create')->with('project', $project);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Project $project)
    {
        $this->validate($request, [
            'task_name' => 'required',
            'task_description' => 'required',
            'task_slug' => 'required',
        ]);

        $task = new Task;
        $task->project_id = $project->id;
        $task->name = $request->input('task_name');
        $task->description = $request->input('task_description');
        $task->slug = $request->input('task_slug');
        $task->completed = false;

        $task->save();

        return Redirect::route('projects.show', $project->slug)->with('success','Task Created Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, Task $task)
    {
        $data = [
            'project' => $project,
            'task' => $task
        ];

        return view('tasks.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, Task $task)
    {
        $data = [
            'project' => $project,
            'task' => $task
        ];
        return view('tasks.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project, Task $task)
    {
        $this->validate($request, [
            'task_name' => 'required',
            'task_slug' => 'required',
            'task_description' => 'required',
        ]);

        $task->name = $request->input('task_name');
        $task->slug = $request->input('task_slug');
        $task->description = $request->input('task_description');

        $task->save();

        return Redirect::route('projects.tasks.show', [$project->slug, $task->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, Task $task)
    {
        $task->delete();
        return Redirect::route('projects.show', $project->slug);
    }
}
