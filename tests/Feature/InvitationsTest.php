<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Facades\Tests\Setup\ProjectFactory;
use Tests\TestCase;

class InvitationsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function non_owners_may_not_invite_users()
    {
        $this->actingAs(factory('App\User')->create())
            ->post(ProjectFactory::create()->path() . '/invitations')->assertStatus(403);
    }


    /** @test */
    public function a_project_can_invite_a_user()
    {
        $this->withoutExceptionHandling();

        $project = ProjectFactory::create();

        $userToInvite = factory('App\User')->create();

        $this->actingAs($project->owner)
            ->post($project->path() . '/invitations', [
                'email' => $userToInvite->email
            ]);

        $this->assertTrue($project->members->contains($userToInvite));
    }

    /** @test */
    public function the_invited_email_address_must_be_a_valid_flyboard_account()
    {
        $project = ProjectFactory::create();

        $this->actingAs($project->owner)
            ->post($project->path() . '/invitations', [
                'email' => 'notauser@example.com'
            ])->assertSessionHasErrors([
                'email' => 'The user you are inviting must have a Flyboard account.'
            ]);
    }

    /** @test */
    public function invited_users_may_update_project_details()
    {
        $project = ProjectFactory::create();

        $project->invite($newUser = factory('App\User')->create());

        $this->actingAs($newUser)
            ->post(action('ProjectTasksController@store', $project), $task = ['body' => 'Foo task']);

        $this->assertDatabaseHas('tasks', $task);
    }
}
