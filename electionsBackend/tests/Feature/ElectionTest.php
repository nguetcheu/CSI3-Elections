<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ElectionTest extends TestCase
{
    /**
     * A basic Election feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/api/election');

        $response->assertStatus(200);
    }

    /**
     * A basic Election insert test example.
     */
    public function insertElection(): void
    {
        $response = $this->get('api/election');
        $this->withHeaders(["X-Headers" => "value"])->post("api/election", ["date" => now(), "statut" => "unit", "label" => "unit", "description" => "unit"]);
        $response->assertStatus(200);
    }
}
