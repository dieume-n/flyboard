<?php

namespace App\Traits;

use App\Activity;
use Illuminate\Support\Arr;


trait RecordActivity
{

    /**
     *  Model old attributes
     *
     *  @var array
     */
    public $oldAttributes = [];


    public static function bootRecordActivity()
    {
        foreach (static::recordableEvents() as $event) {
            static::$event(function ($model) use ($event) {
                $model->recordActivity($model->activityDescription($event));
            });

            if ($event === 'updated') {
                static::updating(function ($model) {
                    $model->oldAttributes = $model->getOriginal();
                });
            }
        }
    }

    protected function activityDescription($description)
    {
        return "{$description}_" . strtolower(class_basename($this));
    }

    /**
     * Get Eloquent events from model if exists
     *  or use defaults created, updated, deleted
     *
     *  @return array
     */
    protected static function recordableEvents()
    {
        if (isset(static::$recordableEvents)) {
            return static::$recordableEvents;
        }

        return  ['created', 'updated'];
    }

    /**
     *  The activity Feed of the project
     *
     *  @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function activities()
    {
        return $this->morphMany(Activity::class, 'subject')->latest();
    }

    /**
     *  Record activity for a project
     *
     *  @param string $description
     */
    public function recordActivity($description)
    {
        $this->activities()->create([
            'user_id' => ($this->project ?? $this)->owner->id,
            'description' => $description,
            'changes' =>  $this->activityChanges(),
            'project_id' => class_basename($this) === 'Project' ? $this->id : $this->project_id
        ]);
    }

    /**
     *  Track changes made to the model
     *
     *  @return array\null
     */
    public function activityChanges()
    {
        if ($this->wasChanged()) {
            return [
                'before' => Arr::except(array_diff($this->oldAttributes, $this->getAttributes()), 'updated_at'),
                'after' => Arr::except($this->getChanges(), 'updated_at')
            ];
        }
    }
}
