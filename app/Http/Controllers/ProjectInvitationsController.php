<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use Illuminate\Http\Request;

class ProjectInvitationsController extends Controller
{
    public function store(Request $request, Project $project)
    {
        $this->authorize('manage', $project);

        $user = User::where($this->validateInvitation())->first();

        $project->invite($user);

        return redirect($project->path());
    }

    protected function validateInvitation()
    {
        return request()->validate([
            'email' => 'required|exists:users,email'
        ], [
            'email.exists' => 'The user you are inviting must have a Flyboard account.'
        ]);
    }
}
