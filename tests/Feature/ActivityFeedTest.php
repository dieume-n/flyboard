<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Facades\Tests\Setup\ProjectFactory;
use Tests\TestCase;

class ActivityFeedTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function creating_a_project_records_activity()
    {
        $project  = ProjectFactory::create();

        $this->assertCount(1, $project->activities);

        $this->assertEquals(
            'created',
            $project->activities()->first()->description
        );
    }

    /** @test */
    public function updating_a_project_records_activity()
    {
        $project = ProjectFactory::create();

        $project->update(['title' => 'change']);

        $this->assertCount(2, $project->activities);
        $this->assertEquals(
            'updated',
            $project->activities->last()->description
        );
    }
}
