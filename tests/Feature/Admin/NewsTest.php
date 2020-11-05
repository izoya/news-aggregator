<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
  /**
   * A basic feature test example.
   *
   * @return void
   */
  public function testAdminNewsRedirect()
  {
    $response = $this->post('/admin/news/', [
      'title' => 'My Title',
    ]);

    $response->assertRedirect('admin/news');
  }
}
