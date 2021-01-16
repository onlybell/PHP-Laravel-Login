<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test Auth user profile data
     *
     * @return void
     */
    public function testLogin()
    {
        $user = new User;

        $data = [
            'email' => 'test@test.com',
            'password'=> '123456',
        ];

        $response = $this->actingAs($user, 'api')
            ->postJson('/api/login', $data);

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true
            ]);
    }
}
