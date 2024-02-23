<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectNearPlace>
 */
class ProjectNearPlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'distance' => $this->faker->randomDigit,
            'time' => $this->faker->randomDigit,
            'image' => $this->faker->imageUrl(),
        ];
    }
}
