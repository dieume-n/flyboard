<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->projects;

        return view('projects.index', ['projects' => $projects]);
    }

    public function show(Project $project)
    {
        $this->authorize('show', $project);

        return view('projects.show', compact('project'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'notes' => 'min:3'
        ]);

        $project = auth()->user()->projects()->create($attributes);

        return redirect($project->path());
    }

    public function update(Request $request, Project $project)
    {
        $this->authorize('update', $project);

        $project->update([
            'notes' => $request->notes
        ]);

        return redirect($project->path());
    }
}
