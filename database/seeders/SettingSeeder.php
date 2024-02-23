<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::query()->truncate();
        Setting::query()->create([
            'website_name' => 'HML Home',
            'website_description' => 'Real State Broker L.L.C',
            'email' => 'hichem@hmlhomes.ae',
            'phone' => '00971502464399',
            'about_us' => ' Welcome to HML Homes, your trusted real estate brokerage firm in the heart of Dubai, UAE. At HML Homes, we pride ourselves on being more than just brokers; we\'re your partners in finding the perfect property solution tailored to your needs. Whether you\'re searching for off-plan projects with the best rates and payment plans or seeking exclusive ready-to-move-in properties, we\'ve got you covered.
    <br><br>
    HML Homes Real Estate Brokers was founded with a core mission: to deliver all-encompassing real estate solutions within the dynamic and continually flourishing real estate sector of the UAE. Our aim is to offer fully integrated services in a rapidly expanding market.',
            'address' => 'Dubai , United Arab Emirates',
            'facebook' => 'https://www.facebook.com',
            'twitter' => 'https://www.twitter.com',
            'instagram' => 'https://www.instagram.com',
            'youtube' => 'https://www.youtube.com',
            'tiktok' => 'https://www.tiktok.com',
            'threads' => 'https://www.threads.com',
            'business_hours' => ' 9:00 am to 6:00 pm',
        ]);

    }
}
