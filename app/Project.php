<?php

namespace App;

use App\Activity;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public $old = [];


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
        $this->activities()->create([
            'description' => $description,
            'changes' =>  $this->activityChanges($description)
        ]);
    }

    public function activityChanges($description)
    {
        if ($description !== 'updated') {
            return null;
        }

        return [
            'before' => Arr::except(array_diff($this->old, $this->getAttributes()), 'updated_at'),
            'after' => Arr::except($this->getChanges(), 'updated_at')
        ];
    }
}
