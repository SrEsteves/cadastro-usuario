<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register()
    {
        $response = $this->postJson('/api/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);

        $response->assertStatus(201)
                 ->assertJson([
                     'message' => 'User registered successfully',
                 ]);

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
        ]);
    }

    public function test_user_cannot_register_with_existing_email()
{
    $this->postJson('/api/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password123',
    ]);

    $response = $this->postJson('/api/register', [
        'name' => 'Another User',
        'email' => 'test@example.com',
        'password' => 'password456',
    ]);

    $response->assertStatus(422)  
             ->assertJsonValidationErrors(['email']);
}

    public function test_can_get_dashboard_data()
    {
        $response = $this->getJson('/api/dashboard');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'totalUsers',
                     'usersCreatedToday',
                     'recentUsers',
                 ]);
    }
}