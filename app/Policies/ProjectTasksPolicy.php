<?php

namespace App\Policies;

use App\User;
use App\Task;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectTasksPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Task $task)
    {
        return $user->is($task->project->owner);
    }
}
