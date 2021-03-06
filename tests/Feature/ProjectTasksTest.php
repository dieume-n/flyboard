<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Facades\Tests\Setup\ProjectFactory;
use Tests\TestCase;

class ProjectTasksTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_cannot_add_tasks_to_project()
    {
        $project = factory('App\Project')->create();

        $this->post($project->path() . "/tasks")->assertRedirect('login');
    }

    /** @test */
    public function only_the_owner_of_a_project_may_add_tasks()
    {
        $this->signIn();

        $project = factory('App\Project')->create();

        $this->post($project->path() . "/tasks", ['body' => 'Test task'])
            ->assertStatus(403);

        $this->assertDatabaseMissing('tasks', ['body' => 'Test task']);
    }


    /** @test */
    public function only_the_owner_of_a_project_may_update_tasks()
    {
        $this->signIn();

        $project = ProjectFactory::withTasks(1)->create();

        $this->patch($project->tasks()->first()->path(), ['body' => 'change'])
            ->assertStatus(403);

        $this->assertDatabaseMissing('tasks', ['body' => 'change']);
    }

    /** @test */
    public function a_project_can_have_tasks()
    {
        $this->withoutExceptionHandling();

        $project = ProjectFactory::create();

        $this->actingAs($project->owner)
            ->post($project->path() . "/tasks", ['body' => 'Test task']);

        $this->get($project->path())->assertSee('Test task');
    }

    /** @test */
    public function a_task_requires_a_body()
    {
        $project = ProjectFactory::create();

        $attributes = factory('App\Task')->raw(['body' => '']);

        $this->actingAs($project->owner)
            ->post($project->path() . "/tasks", $attributes)
            ->assertSessionHasErrors('body');
    }

    /** @test */
    public function a_task_can_be_updated()
    {
        $this->withoutExceptionHandling();

        $project = ProjectFactory::withTasks(1)->create();

        $this->actingAs($project->owner)->patch($project->tasks->first()->path(), [
            'body' => 'test task updated'
        ]);

        $this->assertDatabaseHas('tasks', [
            'body' => 'test task updated'
        ]);
    }

    /** @test */
    public function a_task_can_be_completed()
    {
        $this->withoutExceptionHandling();

        $project = ProjectFactory::withTasks(1)->create();

        $this->actingAs($project->owner)->patch($project->tasks->first()->path(), [
            'body' => 'test task updated',
            'completed' => true
        ]);

        $this->assertDatabaseHas('tasks', [
            'body' => 'test task updated',
            'completed' => true
        ]);
    }

    /** @test */
    public function a_task_can_be_marked_as_incomplete()
    {
        $this->withoutExceptionHandling();

        $project = ProjectFactory::withTasks(1)->create();

        $this->actingAs($project->owner)->patch($project->tasks->first()->path(), [
            'body' => 'test task updated',
            'completed' => true
        ]);

        $this->actingAs($project->owner)->patch($project->tasks->first()->path(), [
            'body' => 'test task updated',
            'completed' => false
        ]);

        $this->assertDatabaseHas('tasks', [
            'body' => 'test task updated',
            'completed' => false
        ]);
    }
}
