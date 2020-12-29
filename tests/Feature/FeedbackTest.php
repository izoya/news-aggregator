<?php

namespace Tests\Feature;

use App\Models\Feedback;
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
     * Assert that after correct feedback form submitting, status 'success' is returned
     * and a database entry is created.
     */
    public function testCorrectFeedbackFormSubmit()
    {
        $model = new Feedback();
        $formData = $user = $model->factory()->make()->toArray();
        $response = $this->withoutMiddleware()->post('/feedback', $formData);

        $response
            ->assertStatus(200)
            ->assertSeeText('success');

        $this->assertDatabaseHas($model->getTable(), [
            'email' => $formData['email'],
        ]);
    }

    /**
     * Assert that empty feedback form submit returns validation errors and an appropriate status.
     */
    public function testEmptyFeedbackFormSubmit()
    {
        $response = $this->withoutMiddleware()->post('/feedback', [
            'name' => '',
            'email' => '',
            'subject' => '',
            'message' => '',
        ]);

        $response
            ->assertStatus(302)
            ->assertRedirect()
            ->assertSessionHasErrorsIn('default', [
                'name' => 'The name field is required.',
                'email' => 'The email field is required.',
                'subject' => 'The subject field is required.',
                'message' => 'The message field is required.',
            ]);
    }
}
