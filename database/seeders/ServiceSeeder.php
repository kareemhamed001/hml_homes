<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::query()->truncate();
        Service::query()->create([
            'title' => 'WE SELL',
            'cover_image' => '/assets/icons/sell.png'
        ]);

        Service::query()->create([
            'title' => 'WE BUY',
            'cover_image' => '/assets/icons/buy.png'
        ]);

        Service::query()->create([
            'title' => 'WE LEASE',
            'cover_image' => '/assets/icons/lease.png'
        ]);
    }
}
