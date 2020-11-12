<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{

    public function testAdminCreateNews()
    {
        $response = $this->get('/admin/news/create');
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testAdminNewsRedirect()
    {
        $response = $this->post('/admin/news/', [
            'title' => 'My title',
            'description' => 'description',
            'content' => 'content',
            'category' => '1',
        ]);

        $response->assertRedirect('/news/my-title');
    }

//    public function testAdminNewsFormHandler()
//    {
//        $response = $this->post('/order', [
//            'title' => 'title',
//            'description' => 'description',
//            'content' => 'content',
//            'category' => '1',
//        ]);
//
//        $response
//            ->dump()
//            ->assertStatus(200)
//            ->assertSeeText('success')
//        ;
//    }

}
