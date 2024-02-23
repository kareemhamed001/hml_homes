<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectImage>
 */
class ProjectImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $listImagesFromPublicFolder = scandir(public_path('assets/images'));
        return [
            'image' => '/assets/images/' . $listImagesFromPublicFolder[rand(2, count($listImagesFromPublicFolder) - 1)],
            'status' => 'active',
            'type'=>$this->faker->randomElement(['inside', 'outside']),
        ];
    }
}
