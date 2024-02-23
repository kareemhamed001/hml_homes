<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
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
            'type' => $this->faker->randomElement(['compound','apartment']),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'cover_image' =>'/assets/images/'. $listImagesFromPublicFolder[rand(2,count($listImagesFromPublicFolder)-1)],
            'price' => $this->faker->numberBetween( 100000, 10000000),
            'manager' => $this->faker->name,
            'manager_description' => $this->faker->optional()->text,
            'manager_image' =>'/assets/images/'. $listImagesFromPublicFolder[rand(2,count($listImagesFromPublicFolder)-1)],
            'location_image' =>'/assets/images/'. $listImagesFromPublicFolder[rand(2,count($listImagesFromPublicFolder)-1)],
            'gps_location' => $this->faker->latitude . ',' . $this->faker->longitude,
            'address' => $this->faker->optional()->address,

        ];
    }
}
