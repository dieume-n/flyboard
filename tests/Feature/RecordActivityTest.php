<?php

namespace Tests\Feature;

use Tests\TestCase;
use Facades\Tests\Setup\ProjectFactory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecordActivityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function creating_a_project()
    {
        $project  = ProjectFactory::create();

        $this->assertCount(1, $project->activities);

        $this->assertEquals(
            'created',
            $project->activities()->first()->description
        );
    }

    /** @test */
    public function updating_a_project()
    {
        $project = ProjectFactory::create();

        $project->update(['title' => 'change']);

        $this->assertCount(2, $project->activities);
        $this->assertEquals(
            'updated',
            $project->activities->last()->description
        );
    }

    /** @test */
    public function creating_a_task()
    {
        $project = ProjectFactory::create();

        $project->addTask('test task');

        $this->assertCount(2, $project->activities);

        tap($project->activities->last(), function ($activity) {
            $this->assertEquals('created_task', $activity->description);
            $this->assertInstanceOf('App\Task', $activity->subject);
            $this->assertEquals('test task', $activity->subject->body);
        });
    }

    /** @test */
    public function completing_a_task()
    {
        $this->withoutExceptionHandling();
        $project = ProjectFactory::withTasks(1)->create();

        $this->actingAs($project->owner)
            ->patch($project->tasks[0]->path(), [
                'body' => 'change',
                'completed' => true
            ]);

        $this->assertCount(3, $project->activities);


        tap($project->activities->last(), function ($activity) {
            $this->assertEquals(
                'completed_task',
                $activity->description
            );
            $this->assertInstanceOf('App\Task', $activity->subject);
        });
    }

    /** @test */
    public function marking_task_as_incomplete()
    {
        // $this->withoutExceptionHandling();
        $project = ProjectFactory::withTasks(1)->create();

        $this->actingAs($project->owner)
            ->patch($project->tasks[0]->path(), [
                'body' => 'change',
                'completed' => true
            ]);

        $this->assertCount(3, $project->activities);

        $this->patch($project->tasks[0]->path(), [
            'body' => 'change',
            'completed' => false
        ]);

        tap($project->fresh()->activities->last(), function ($activity) {
            $this->assertInstanceOf('App\Task', $activity->subject);
        });

        $this->assertCount(4, $project->fresh()->activities);
    }

    /** @test */
    public function deleting_task()
    {
        // $this->withoutExceptionHandling();
        $project = ProjectFactory::withTasks(1)->create();

        $project->tasks[0]->delete();

        $this->assertCount(3, $project->activities);

        $this->assertEquals(
            'deleted_task',
            $project->activities->last()->description
        );
    }
}
