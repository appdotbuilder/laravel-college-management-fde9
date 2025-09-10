<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fund>
 */
class FundFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sponsorTypes = ['PTPTN', 'PTPK', 'MARA', 'BankLoan', 'Scholarship', 'Others'];
        $sponsorType = fake()->randomElement($sponsorTypes);
        
        return [
            'student_id' => Student::factory(),
            'sponsor_type' => $sponsorType,
            'sponsor_name' => $sponsorType === 'Others' ? fake()->company() : null,
            'amount' => fake()->randomFloat(2, 1000, 15000),
            'disbursement_date' => fake()->dateTimeBetween('-2 years', 'now'),
            'status' => fake()->randomElement(['pending', 'received', 'failed']),
            'remarks' => fake()->optional()->sentence(),
        ];
    }

    /**
     * Indicate that this is a PTPTN fund.
     */
    public function ptptn(): static
    {
        return $this->state(fn (array $attributes) => [
            'sponsor_type' => 'PTPTN',
            'sponsor_name' => null,
            'amount' => fake()->randomFloat(2, 5000, 15000),
        ]);
    }

    /**
     * Indicate that this is a scholarship fund.
     */
    public function scholarship(): static
    {
        return $this->state(fn (array $attributes) => [
            'sponsor_type' => 'Scholarship',
            'sponsor_name' => null,
            'amount' => fake()->randomFloat(2, 2000, 10000),
        ]);
    }
}