<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * Assert that an unauthorized user have access to /login page.
     */
    public function testLoginPage()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    /**
     * Assert that an authorized user redirects to account from /login page.
     */
    public function testRedirectToAccountWhenAuthorized()
    {
        $user = User::first();
        $response = $this->actingAs($user)->get('/login');
        $response->assertRedirect('/account');
    }
}
