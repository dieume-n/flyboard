<?php

namespace App;

use App\Activity;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];


    public function path()
    {
        return "/projects/{$this->id}";
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($body)
    {
        return $this->tasks()->create(compact('body'));
    }

    public function activities()
    {
        return $this->hasMany(Activity::class)->latest();
    }

    /**
     *  Record activity for a project
     *
     *  @param string $description
     */
    public function recordActivity($description)
    {
        $this->activities()->create(['description' => $description]);
    }
}
