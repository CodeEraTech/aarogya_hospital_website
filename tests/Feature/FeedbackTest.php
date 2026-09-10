<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class FeedbackTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_feedback_page_renders_the_form(): void
    {
        $this->get('/patient-resources/feedback')->assertSee('Share Your Experience');
    }

    public function test_valid_feedback_is_stored(): void
    {
        $response = $this->post('/feedback', ['name' => 'Ravi Kumar', 'rating' => 5, 'message' => 'The nursing team was very helpful.']);

        $response->assertRedirect()->assertSessionHas('feedback_success', true);
        $this->assertDatabaseHas('feedback', ['name' => 'Ravi Kumar', 'rating' => 5, 'status' => 'New']);
    }

    public function test_invalid_feedback_is_rejected_without_writing(): void
    {
        $this->post('/feedback', ['name' => 'A', 'rating' => 8, 'message' => 'short'])->assertSessionHasErrors(['name', 'rating', 'message']);

        $this->assertDatabaseCount('feedback', 0);
    }
}
