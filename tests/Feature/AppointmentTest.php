<?php

namespace Tests\Feature;

use App\Models\Appointment;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class AppointmentTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_homepage_loads(): void
    {
        $this->get('/')->assertSee('Expert care.');
    }

    public function test_valid_appointment_is_stored(): void
    {
        $response = $this->post('/appointments', ['name' => 'Test Patient', 'phone' => '9876543210', 'speciality' => 'Orthopaedics', 'date' => now()->addDay()->toDateString()]);
        $response->assertRedirect()->assertSessionHas('appointment_success', true);
        $this->assertDatabaseHas(Appointment::class, ['patient_name' => 'Test Patient', 'mobile_number' => '9876543210', 'status' => 'New']);
    }

    public function test_invalid_appointment_is_rejected(): void
    {
        $this->post('/appointments', ['name' => 'A', 'phone' => '123'])
            ->assertSessionHasErrors([
                'name' => 'The name field must be at least 2 characters.',
                'phone',
                'speciality' => 'The speciality field is required.',
            ]);

        $this->assertDatabaseCount('appointments', 0);
    }
}
