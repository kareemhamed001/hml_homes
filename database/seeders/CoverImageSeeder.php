<?php

namespace Database\Seeders;

use App\Models\CoverImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoverImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CoverImage::query()->truncate();
        CoverImage::factory(10)->create();
    }
}
