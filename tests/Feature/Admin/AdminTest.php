<?php

namespace Tests\Feature\Admin;

use App\Models\Feed;
use App\Models\User;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /** @var User */
    private $admin;

    /**
     * Returns user with admin privileges
     * @return User
     */
    private function admin(): User
    {
        if (!$this->admin) {
            $this->admin = User::whereIsAdmin(true)->first();
        }

        return $this->admin;
    }

    /**
     * Assert that a user without admin privileges hasn't an access to the Admin panel.
     */
    public function testAdminUnauthorizedAccessDenied()
    {
        $user = User::whereIsAdmin(false)->first();
        $response = $this->actingAs($user)->get('/admin');
        $response->assertNotFound();
    }

    /**
     * Assert Admin panel index page availability for a user with admin rights.
     */
    public function testAdminIndexPage()
    {
        $response = $this->actingAs($this->admin())->get('/admin');
        $response->assertStatus(200);
    }

    /**
     * Assert Admin panel news page availability for a user with admin rights.
     */
    public function testAdminNewsPage()
    {
        $response = $this->actingAs($this->admin())->get('/admin/news');
        $response->assertStatus(200);
    }

    /**
     * Assert Admin panel user page availability for a user with admin rights.
     */
    public function testAdminUsersPage()
    {
        $response = $this->actingAs($this->admin())->get('/admin/user');
        $response->assertStatus(200);
    }

    /**
     * Assert Admin panel category page availability for a user with admin rights.
     */
    public function testAdminCategoriesPage()
    {
        $response = $this->actingAs($this->admin())->get('/admin/category');
        $response->assertStatus(200);
    }

    /**
     * Assert Admin panel feedback page availability for a user with admin rights.
     */
    public function testAdminFeedbackPage()
    {
        $response = $this->actingAs($this->admin())->get('/admin/feedback');
        $response->assertStatus(200);
    }

    /**
     * Assert Admin panel source page availability for a user with admin rights.
     */
    public function testAdminSourcesPage()
    {
        $response = $this->actingAs($this->admin())->get('/admin/source');
        $response->assertStatus(200);
    }

    /**
     * Assert Admin panel feeds page availability for a user with admin rights.
     */
    public function testAdminFeedsPage()
    {
        $response = $this->actingAs($this->admin())->get('/admin/feed');
        $response->assertStatus(200);
    }

    /**
     * Assert that parser starts without errors.
     * This only shows that all feeds were queued for parsing, but
     * don't signals of any errors which could occur during parsing.
     */
    public function testAdminParserRunWithoutErrors()
    {
        $feedCount = Feed::count();
        $response = $this->actingAs($this->admin())->get('/admin/parser');

        $response->assertSessionHasNoErrors()
            ->assertSessionHas('success', $feedCount . ' feeds were passed to the parser.');

        $this->artisan('queue:clear');
    }
}
