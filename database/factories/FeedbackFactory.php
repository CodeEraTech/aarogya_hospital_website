<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<\App\Models\Feedback> */
class FeedbackFactory extends Factory
{
    /** @return array<string, mixed> */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'phone' => fake()->numerify('9#########'),
            'email' => fake()->safeEmail(),
            'department' => 'Orthopaedics',
            'rating' => fake()->numberBetween(1, 5),
            'message' => fake()->sentence(),
            'status' => 'New',
        ];
    }
}
