<?php

namespace Database\Factories;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reference' => 'APT-'.now()->format('ymd').'-'.Str::upper(Str::random(6)),
            'patient_name' => fake()->name(),
            'mobile_number' => fake()->numerify('9#########'),
            'email' => fake()->safeEmail(),
            'speciality' => fake()->randomElement(['Orthopaedics', 'Robotic Joint Replacement', 'Infertility & IVF', 'Trauma']),
            'preferred_date' => fake()->dateTimeBetween('+1 day', '+30 days'),
            'preferred_time' => 'Morning (9 AM–12 PM)',
            'source' => 'Website',
            'status' => 'New',
        ];
    }
}
