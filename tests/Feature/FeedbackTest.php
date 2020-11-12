<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeedbackTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testFeedbackFormPage()
    {
        $response = $this->get('/feedback');
        $response->assertStatus(200);
    }

    public function testFeedbackFormHandler()
    {
        $response = $this->post('/feedback', [
            'name' => 'Sally',
            'email' => 'some@mail.com',
            'subject' => 'subject',
            'message' => 'message',
        ]);

        $response
            ->assertStatus(200)
            ->assertSeeText('success');

    }
}
