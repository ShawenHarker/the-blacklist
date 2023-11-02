<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentTeacher>
 */
class StudentTeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'school_id' => fake()->numberBetween(1, 2),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'location' => fake()->address(),
            'is_blacklisted' => fake()->boolean(0),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}