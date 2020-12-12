<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeedbackTest extends TestCase
{
    /**
     * Assert feedback form page availability.
     */
    public function testFeedbackFormPage()
    {
        $response = $this->get('/feedback');
        $response->assertStatus(200);
    }

    /**
     * Assert feedback form page availability.
     */
    public function testFeedbackFormHandler()
    {
        $response = $this->post('/feedback', [
            'name' => 'Sally',
            'email' => 'some@mail.com',
            'subject' => 'subject',
            'message' => 'message',
        ]);

        $response->dumpHeaders();

        $response
            ->assertStatus(200)
            ->assertSeeText('success');

    }
}
