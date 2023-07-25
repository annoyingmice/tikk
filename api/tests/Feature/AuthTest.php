<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    private $baseV1 = '/api/v1';

    /**
     * It should test login successfully
     */
    public function test_should_login_success(): void
    {
        $response = $this->postJson("$this->baseV1/login", ['phone' => '1234']);
        $response->assertStatus(200);
        $response->dump();
    }

    public function test_should_login_fail_credential(): void
    {
        $response = $this->postJson("$this->baseV1/login", []);
        $response->assertStatus(422);
        $response->dump();
    }

    public function test_should_login_fail_account_not_found(): void
    {
        $response = $this->postJson("$this->baseV1/login", ['phone' => '12345']);
        $response->assertStatus(404);
        $response->dump();
    }

    public function test_should_verify_otp(): void
    {
        $response = $this->postJson("$this->baseV1/verify", ['otp' => '123456']);
        $response->assertStatus(200);
        $response->dump();
    }

    public function test_should_fail_verify_otp(): void
    {
        $response = $this->postJson("$this->baseV1/verify", ['otp' => '123455']);
        $response->assertStatus(404);
        $response->dump();
    }
}
