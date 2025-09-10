<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FeeType>
 */
class FeeTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['tuition', 'hostel', 'transport', 'registration', 'others'];
        $frequencies = ['one_time', 'monthly', 'semester'];
        
        return [
            'name' => fake()->words(2, true) . ' Fee',
            'category' => fake()->randomElement($categories),
            'frequency' => fake()->randomElement($frequencies),
            'amount_default' => fake()->randomFloat(2, 100, 5000),
        ];
    }

    /**
     * Indicate that this is a tuition fee.
     */
    public function tuition(): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => 'Tuition Fee',
            'category' => 'tuition',
            'frequency' => 'semester',
            'amount_default' => fake()->randomFloat(2, 3000, 8000),
        ]);
    }

    /**
     * Indicate that this is a hostel fee.
     */
    public function hostel(): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => 'Hostel Fee',
            'category' => 'hostel',
            'frequency' => 'semester',
            'amount_default' => fake()->randomFloat(2, 1000, 3000),
        ]);
    }
}