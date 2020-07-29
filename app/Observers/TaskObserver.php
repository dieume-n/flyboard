<?php

namespace App\Observers;

use App\Task;
use App\Activity;

class TaskObserver
{
    /**
     * Handle the task "created" event.
     *
     * @param  \App\Task  $task
     * @return void
     */
    public function created(Task $task)
    {
        Activity::create([
            'project_id' => $task->project->id,
            'description' => 'created_task'
        ]);
    }

    /**
     * Handle the task "updated" event.
     *
     * @param  \App\Task  $task
     * @return void
     */
    public function updated(Task $task)
    {
        if (!$task->completed) return;

        Activity::create([
            'project_id' => $task->project->id,
            'description' => 'completed_task'
        ]);
    }
}
