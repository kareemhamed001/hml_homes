<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feedback>
 */
class FeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_name' => $this->faker->name,
            'user_image' => '/assets/'.$this->faker->numberBetween(28,31).'.png',
            'comment' => $this->faker->text,
            'rate' => $this->faker->numberBetween(1, 5),
            'status' => $this->faker->randomElement(['active', 'inactive'])
        ];
    }
}
