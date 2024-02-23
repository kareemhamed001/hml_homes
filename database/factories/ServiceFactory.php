<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $listImagesFromPublicFolder= scandir(public_path('assets/images'));


        return [
            'title' => $this->faker->name,
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'cover_image' =>'/assets/images/'. $listImagesFromPublicFolder[rand(2,count($listImagesFromPublicFolder)-1)],
        ];
    }
}
