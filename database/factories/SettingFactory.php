<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'website_name' => config('websiteSettings.website_name'),
            'website_description' => config('websiteSettings.website_description'),
            'email' => config('websiteSettings.email'),
            'phone' => config('websiteSettings.phone'),
            'about_us' => config('websiteSettings.about_us'),
        ];
    }
}
