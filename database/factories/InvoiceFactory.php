<?php

namespace Database\Factories;

use App\Models\FeeType;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
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
            'fee_type_id' => FeeType::factory(),
            'amount' => fake()->randomFloat(2, 100, 5000),
            'status' => fake()->randomElement(['unpaid', 'paid', 'cancelled']),
            'invoice_date' => fake()->dateTimeBetween('-1 year', 'now'),
            'invoice_number' => 'INV-' . fake()->unique()->numberBetween(100000, 999999),
            'generated_by' => User::factory(),
        ];
    }

    /**
     * Indicate that the invoice is unpaid.
     */
    public function unpaid(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'unpaid',
        ]);
    }

    /**
     * Indicate that the invoice is paid.
     */
    public function paid(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'paid',
        ]);
    }
}