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
        static::updating(function ($model) {
            $model->oldAttributes = $model->getOriginal();
        });
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
