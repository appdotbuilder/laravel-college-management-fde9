<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'id_no' => 'STU' . fake()->unique()->numberBetween(100000, 999999),
            'matric_no' => fake()->optional(0.8)->regexify('[A-Z]{2}[0-9]{6}'),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->optional()->address(),
            'guardian_name' => fake()->optional(0.7)->name(),
            'guardian_phone' => fake()->optional(0.7)->phoneNumber(),
        ];
    }

    /**
     * Indicate that the student has complete guardian information.
     */
    public function withGuardian(): static
    {
        return $this->state(fn (array $attributes) => [
            'guardian_name' => fake()->name(),
            'guardian_phone' => fake()->phoneNumber(),
        ]);
    }
}