<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectPrice>
 */
class ProjectPriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'configuration' => $this->faker->randomElement(['Studio', 'Apartment', 'Villa', 'Penthouse', 'Duplex']),
            'area' => $this->faker->randomElement(['50', '60', '70', '80', '90', '100', '110', '120', '130', '140', '150']),
            'price' => $this->faker->randomElement(['10000', '20000', '30000', '40000', '50000', '60000', '70000', '80000', '90000', '100000']),
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
