<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectPaymentPlan>
 */
class ProjectPaymentPlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'step' => $this->faker->randomElement(['step 1', 'step 2', 'step 3', 'step 4', 'step 5']),
            'name' => $this->faker->randomElement(['payment 1', 'payment 2', 'payment 3', 'payment 4', 'payment 5']),
            'description' => $this->faker->randomElement(['pay 10%', 'pay 20%', 'pay 30%', 'pay 40%', 'pay 50%']),
            'price' => $this->faker->randomElement(['10000', '20000', '30000', '40000', '50000', '60000', '70000', '80000', '90000', '100000']),
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
