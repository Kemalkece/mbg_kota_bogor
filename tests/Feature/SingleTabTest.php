<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SingleTabTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * The `activate-tab` endpoint should exist and regenerate the session id.
     */
    public function activate_tab_endpoint_regenerates_session_id()
    {
        // start a session so we can capture its id
        $this->startSession();
        $oldId = session()->getId();

        // hit the route; the testing client should reuse the same session
        $response = $this->post('/admin/activate-tab', []);
        $response->assertStatus(200)->assertJson(['success' => true]);

        $newId = session()->getId();
        $this->assertNotEquals($oldId, $newId, 'Session ID should have been regenerated.');
    }
}
