<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    public function store(Request $request, Project $project)
    {
        $this->authorize('addTask', $project);

        request()->validate(['body' => 'required']);

        $project->addTask($request->body);

        return redirect($project->path());
    }

    public function update(Request $request, Project $project, Task $task)
    {
        $this->authorize('update', $task);

        $task->update(request()->validate(['body' => 'required']));

        $method = request('completed') ? 'complete' : 'incomplete';

        $task->$method();

        return redirect($project->path());
    }
}
