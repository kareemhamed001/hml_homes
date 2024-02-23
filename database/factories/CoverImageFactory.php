<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CoverImage>
 */
class CoverImageFactory extends Factory
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
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'image' =>'/assets/images/'. $listImagesFromPublicFolder[rand(2,count($listImagesFromPublicFolder)-1)],
//            'image' => '/assets/cover.png',
        ];
    }
}
