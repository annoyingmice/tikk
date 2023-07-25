<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_should_always_ok(): void
    {
        $response = $this->get('/healthcheck');

        $response->assertStatus(200);
    }
}
