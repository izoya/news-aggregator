<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /** @var User */
    private $admin;

    private function admin()
    {
        if (!$this->admin) {
            $this->admin = User::whereIsAdmin(true)->first();
        }

        return $this->admin;
    }

    public function testAdminUnauthorizedAccessDenied()
    {
        $user = User::whereIsAdmin(false)->first();
        $response = $this->actingAs($user)->get('/admin');
        $response->assertNotFound();
    }

    public function testAdminIndexPage()
    {
        $response = $this->actingAs($this->admin())->get('/admin');
        $response->assertStatus(200);
    }

    public function testAdminNewsPage()
    {
        $response = $this->actingAs($this->admin())->get('/admin/news');
        $response->assertStatus(200);
    }

    public function testAdminUsersPage()
    {
        $response = $this->actingAs($this->admin())->get('/admin/user');
        $response->assertStatus(200);
    }

    public function testAdminCategoriesPage()
    {
        $response = $this->actingAs($this->admin())->get('/admin/category');
        $response->assertStatus(200);
    }

    public function testAdminFeedbackPage()
    {
        $response = $this->actingAs($this->admin())->get('/admin/feedback');
        $response->assertStatus(200);
    }

    public function testAdminSourcesPage()
    {
        $response = $this->actingAs($this->admin())->get('/admin/source');
        $response->assertStatus(200);
    }

    public function testAdminFeedsPage()
    {
        $response = $this->actingAs($this->admin())->get('/admin/feed');
        $response->assertStatus(200);
    }

    // TODO: uncomment after test database enabled
//    public function testAdminParserSuccess()
//    {
//        $response = $this->actingAs($this->admin())->get('/admin/parser');
//        $response->assertSessionHasNoErrors();
//    }
}
