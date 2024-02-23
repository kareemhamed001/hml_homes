<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CoverImage;
use App\Models\Feedback;
use App\Models\Project;
use App\Models\ProjectFeature;
use App\Models\ProjectImage;
use App\Models\ProjectNearPlace;
use App\Models\ProjectPaymentPlan;
use App\Models\ProjectPrice;
use App\Models\Package;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

//        User::truncate();
//        \App\Models\User::factory(10)->create();
//
        Feedback::query()->truncate();
        Feedback::factory(10)->create();
//
//        Service::truncate();
//        Service::factory(5)->create();
//
//        Setting::truncate();
//        Setting::factory(1)->create();
//
        Partner::truncate();
        Partner::factory(10)->create();
//


        $this->call(CoverImageSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(ProjectSeeder::class);

        User::query()->truncate();
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'turk@gmail.com',
            'password' => bcrypt('123456789'),
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
