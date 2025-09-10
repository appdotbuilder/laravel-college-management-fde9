<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
            'amount' => fake()->randomFloat(2, 50, 3000),
            'method' => fake()->randomElement(['cash', 'bank_transfer', 'online']),
            'status' => fake()->randomElement(['pending', 'paid', 'failed']),
            'payment_date' => fake()->dateTimeBetween('-1 year', 'now'),
            'receipt_number' => 'RCP-' . fake()->unique()->numberBetween(100000, 999999),
            'received_by' => User::factory(),
        ];
    }

    /**
     * Indicate that the payment is completed.
     */
    public function completed(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'paid',
        ]);
    }
}