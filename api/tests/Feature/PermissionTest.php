<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PermissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_should_list_permissions(): void
    {
        $response = $this->get("$this->baseV1/permissions?limit=1", ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(200)
            ->assertJsonIsObject();
        $response->dump();
    }

    public function test_should_create_permission(): void
    {
        $response = $this->postJson("$this->baseV1/permissions", ['name' => 'test', 'owner' => null], ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(201)
            ->assertJsonIsObject();
        $response->dump();
    }

    public function test_should_update_permission(): void
    {
        $response = $this->putJson("$this->baseV1/permissions/1", ['name' => 'test1', 'owner' => null], ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(200)
            ->assertJsonIsObject();
        $response->dump();
    }

    public function test_should_show_permission()
    {
        $response = $this->get("$this->baseV1/permissions/1", ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(200)
            ->assertJsonIsObject();
        $response->dump();
    }

    public function test_should_delete_permission()
    {
        $response = $this->get("$this->baseV1/permissions/1", ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(200)
            ->assertJsonIsObject();
        $response->dump();
    }
}
