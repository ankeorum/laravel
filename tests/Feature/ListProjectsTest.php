<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListProjectsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_see_all_projects()
    {
        $project = Project::factory()->times(5)->make();

        // dd($project->toArray());

        $response = $this->get(route('projects.index'));

        $response->assertStatus(200);
        // $response->assertViewIs('projects.index');
        // $response->assertViewHas('projects');
        // $response->assertSee($project->title);
    }
}
