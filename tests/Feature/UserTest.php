<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_successful_response_with_all_users()
    {
        User::factory()->count(3)->create();

        $response = $this->getJson('/users');

        $response->assertStatus(200)
                 ->assertJson([
                     'status' => 'success',
                 ])
                 ->assertJsonCount(3, 'data')
                 ->assertJsonStructure([
                     'status',
                     'data' => [
                         '*' => ['id', 'name', 'email', 'email_verified_at', 'created_at', 'updated_at'],
                     ]
                 ]);
    }
}
