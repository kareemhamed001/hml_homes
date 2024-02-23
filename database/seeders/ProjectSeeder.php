<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectFeature;
use App\Models\ProjectImage;
use App\Models\ProjectNearPlace;
use App\Models\ProjectPaymentPlan;
use App\Models\ProjectPrice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProjectSeeder extends Seeder
{


    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::query()->truncate();
        ProjectImage::query()->truncate();
        ProjectFeature::query()->truncate();
        ProjectPrice::query()->truncate();
        ProjectPaymentPlan::query()->truncate();
        ProjectNearPlace::query()->truncate();

        $project1 = Project::query()->create([
            'name' => 'Azizi Venice',
            'description' => 'A Water-inspired Living! The community boasts residential beauties, including studio units, luxurious 1-3-bedroom apartments, and villas with beach views.
A prime location within the Dubai South offers residents the best of both worlds. Offering effortless connectivity to the rest of the city.',
            'type' => 'compound',
            'status' => 'active',
            'cover_image' => '/storage/projects/Azizi_Venice/cover_image/cover_image.png',
            'price' => '480000',
            'manager' => 'Azizi Developments',
            'manager_description' => 'Azizi Developments is a leading developer based in Dubai with an extensive portfolio of modern luxury residential and commercial properties across the emirate’s most sought-after locations. Our properties, through which we aim to enrich the lives of our residents and investors, cater to all lifestyles. Azizi Developments is a customer-oriented and driven company, conceived in 2007, with an initial focus on developing high-quality residential apartments in prime locations, the company has since developed into a diversified real estate developer, with a global footprint, and a wide range of lifestyle choices that meet the needs of modern-day investors.',
            'manager_image' => '/storage/projects/Azizi_Venice/cover_image/cover_image.png',
            'location_image' => '',
            'gps_location' => 'Dubai South',
            'address' => 'Dubai South',
        ]);

        //adding those features in one query
        // Swimming pools
        //GYM
        //Parks & Lesiure areas
        //Restaurants
        //Dining outlets
        //Retail outlets
        //Supermarket
        //Waterfront
        //Health care centre
        //24x7 Security
        //Sports activities
        //Kids play area

        $project1->features()->createMany([
            [
                'name' => 'Swimming pools',
                'image' => '/assets/icons/SWIMMING_POOL.svg'
            ],
            [
                'name' => 'GYM',
                'image' => '/assets/icons/Gym.svg'
            ],
            [
                'name' => 'Parks & Lesiure areas',
                'image' => '/assets/icons/Parks.svg'
            ],
            [
                'name' => 'Restaurants',
                'image' => '/assets/icons/RESTAURANTS.svg'
            ],
            [
                'name' => 'Dining outlets',
                'image' => '/assets/icons/Dining_Outlets.svg'
            ],
            [
                'name' => 'Retail outlets',
                'image' => '/assets/icons/RETAIL_OUTLETS.svg'
            ],
            [
                'name' => 'Supermarket',
                'image' => '/assets/icons/SUPERMARKET.svg'
            ],
            [
                'name' => 'Waterfront',
                'image' => '/assets/icons/Waterfront.svg'
            ],
            [
                'name' => 'Health care centre',
                'image' => '/assets/icons/Heal_care.svg'
            ],
            [
                'name' => '24x7 Security',
                'image' => '/assets/icons/24x7_Security.svg'
            ],
            [
                'name' => 'Sports activities',
                'image' => '/assets/icons/Sports.svg'
            ],
            [
                'name' => 'Kids play area',
                'image' => '/assets/icons/Kids_Area.svg'
            ],
        ]);

        //add those near places in one query
        //7 Minutes to DWC Airport
        //15 Minutes to Palm Jebel Ali
        //5 Minutes to Metro Station
        $project1->nearPlaces()->createMany([
            [
                'name' => 'DWC Airport',
                'time' => '7 Minutes'
            ],
            [
                'name' => 'Palm Jebel Ali',
                'time' => '15 Minutes'
            ],
            [
                'name' => 'Metro Station',
                'time' => '5 Minutes'
            ],
        ]);

        //adding those prices in one query
        //Studios, 1, 2, and 3 bedroom
        //apartments and villas

        $project1->prices()->createMany([
            [
                'configuration' => 'Studios',
                'area' => '1, 2, and 3 bedroom',
                'price' => '480000',
            ],
            [
                'configuration' => 'apartments',
                'area' => '1, 2, and 3 bedroom',
                'price' => '480000',
            ],
            [
                'configuration' => 'villas',
                'area' => '1, 2, and 3 bedroom',
                'price' => '480000',
            ],

        ]);

        //adding those payment plans
        //10%
        //Down Payment
        //On Booking Date
        //-------------------
        //50%
        //During Construction
        //Easy Installment
        //-------------------
        //40%
        //On Handover
        //100% Completion
        //-------------------

        $project1->paymentPlans()->createMany([
            [
                'step' => 'Down Payment',
                'name' => 'On Booking Date',
                'description' => '10%',

            ],
            [
                'step' => 'During Construction',
                'name' => 'Easy Installment',
                'description' => '50%',
            ],
            [
                'step' => 'On Handover',
                'name' => '100% Completion',
                'description' => '40%',
            ],
        ]);

        //list images from assets/storage/projects/Azizi_Venice/images
        $project_one_list_images = Storage::disk('public')->files('projects/Azizi_Venice/images');

        //add those images in one query
        foreach ($project_one_list_images as $image) {
            if ($image != '.' && $image != '..') {
                $project1->images()->create([
                    'image' => '/storage/' . $image
                ]);
            }
        }


        $project2 = Project::query()->create([
            'name' => 'Sobha One',
            'description' => 'A new development by Sobha Group that features 1 to 4-bedroom waterfront apartments located at Sobha Hartland, Dubai. Discover a life that is both rich enough to appeal to the brilliance of modernity and close enough to nature to be considered interesting and elegant.',
            'type' => 'compound',
            'status' => 'active',
            'cover_image' => '/storage/projects/Sobha_One/cover_image/cover_image.png',
            'price' => '1500000',
            'manager' => 'Sobha Group',
            'manager_description' => 'Sobha Group is a multinational, multiproduct group with developments and investments in U.A.E., Sultanate of Oman, Qatar, Bahrain, Brunei and India. Established in 1976 by a first generation Indian entrepreneur, PNC Menon as an interior decoration firm under the name of Services and Trade Company in Muscat, Oman, the group has grown into one of the most respected names in all the countries in which it has established businesses. The organization is one of the fastest growing and foremost backward integrated real estate organizations in the region. Sobha is primarily focused on residential and contractual projects. The Company’s residential projects include presidential apartments, villas, row houses, luxury and super luxury apartments, plotted development and aspirational homes replete with world-class amenities. In all its residential projects, the company lays a strong emphasis on environmental management, water harvesting and high safety standards.',
            'manager_image' =>  '/storage/projects/Sobha_One/cover_image/cover_image.png',
            'location_image' => '',
            'gps_location' => 'Ras Al Khor',
            'address' => 'Ras Al Khor',
        ]);

        //list images from assets/storage/projects/Sobha_One/images
        $project_two_list_images = Storage::disk('public')->files('projects/Sobha_One/images');

        //add those images in one query
        foreach ($project_two_list_images as $image) {
            if ($image != '.' && $image != '..') {
                $project2->images()->create([
                    'image' => '/storage/' . $image
                ]);
            }
        }

        //adding those features in one query
        // Gymnasium
        //Kids Play Area
        //Grand Clubhouse
        //Sports Court
        //Swimming Pools
        //Landscape Garden
        //Barbecue Area
        //Sky Terrace

        $project2->features()->createMany([
            [
                'name' => 'Gymnasium',
                'image' => '/assets/icons/Gym.svg'
            ],
            [
                'name' => 'Kids Play Area',
                'image' => '/assets/icons/Kids_Area.svg'
            ],
            [
                'name' => 'Grand Clubhouse',
                'image' => '/assets/icons/Club_House.svg'
            ],
            [
                'name' => 'Sports Court',
                'image' => '/assets/icons/Sports.svg'
            ],
            [
                'name' => 'Swimming Pools',
                'image' => '/assets/icons/SWIMMING_POOL.svg'
            ],
            [
                'name' => 'Landscape Garden',
                'image' => '/assets/icons/Parks.svg'
            ],
            [
                'name' => 'Barbecue Area',
                'image' => '/assets/icons/BBQ.svg'
            ],
            [
                'name' => 'Sky Terrace',
                'image' => '/assets/icons/Sky_Terrace.svg'
            ],
        ]);

        //add those near places in one query
        //12 Minutes to Dubai International Airport
        //12 Minutes to Business Bay
        //15 Minutes to The Dubai Mall
        //15 Minutes to Burj Khalifa & Downtown Dubai
        //25 Minutes to Palm Jumeirah

        $project2->nearPlaces()->createMany([
            [
                'name' => 'Dubai International Airport',
                'time' => '12 Minutes'
            ],
            [
                'name' => 'Business Bay',
                'time' => '12 Minutes'
            ],
            [
                'name' => 'The Dubai Mall',
                'time' => '15 Minutes'
            ],
            [
                'name' => 'Burj Khalifa & Downtown Dubai',
                'time' => '15 Minutes'
            ],
            [
                'name' => 'Palm Jumeirah',
                'time' => '25 Minutes'
            ],
        ]);

        //1, 2, 3, and 4 Bedroom Apartments
        $project2->prices()->createMany([
            [
                'configuration' => 'Apartments',
                'area' => '1, 2, 3, and 4 Bedroom',
                'price' => '1500000',
            ],
        ]);

        //adding those payment plans
        //60%
        //During Construction
        //Easy Installment
        //-------------------
        //40%
        //On Handover
        //100% Completion
        //-------------------

        $project2->paymentPlans()->createMany([
            [
                'step' => 'During Construction',
                'name' => 'Easy Installment',
                'description' => '60%',
            ],
            [
                'step' => 'On Handover',
                'name' => '100% Completion',
                'description' => '40%',
            ],
        ]);

        $project3 = Project::query()->create([
            'name' => 'Sportz by Danube',
            'description' => 'Within a vibrant community, Danube Properties\' latest project is a sports-centric residential experience. The development features luxurious 1-3 bedroom apartments along with a multitude of sports and leisure integrations such as state-of-the-art fitness centers, Olympic-sized swimming pools, and much more.',
            'type' => 'compound',
            'status' => 'active',
            'cover_image' => '/assets/28.png',
            'price' => '590000',
            'manager' => 'Danube Properties',
            'manager_description' => 'Danube Properties is a leading property developer in the UAE, established in 2014, and is part of the Danube Group, the region’s largest building materials company established in 1993. The company firmly believes that delivering on promises is not just good business but the right thing to do. The company has delivered 4,744 units to date and has a development portfolio of 6,194 units with a combined value exceeding Dh13.3 billion. The company plans to deliver 1,711 units in 2021 and 2,000 units in 2022. Danube Properties has been awarded the prestigious ISO 9001:2015 certification for Quality Management Systems and ISO 14001:2015 certification for Environmental Management Systems, and OHSAS 18001:2007 for Occupational Health and Safety Management System. The company has also been awarded the prestigious Superbrands 2021 award.',
            'manager_image' => '/assets/images/azizi-developments.jpg',
            'location_image' => '',
            'gps_location' => 'Dubai Sports City',
            'address' => 'Dubai Sports City',
        ]);

//adding those features as one query
// Sky Jacuzzi
//Daycare Center
//Floating Cinema
//Badminton Court
//Wall Climbing
//Archery
//Smart Mart
//BBQ Area

        $project3->features()->createMany([
            [
                'name' => 'Sky Jacuzzi',
                'image' => '/assets/icons/Sky_Terrace.svg'
            ],
            [
                'name' => 'Daycare Center',
                'image' => '/assets/icons/Daycare_Center.svg'
            ],
            [
                'name' => 'Floating Cinema',
            ],
            [
                'name' => 'Badminton Court',
            ],
            [
                'name' => 'Wall Climbing',

            ],
            [
                'name' => 'Archery',
            ],
            [
                'name' => 'Smart Mart',
                'image' => '/assets/icons/SUPERMARKET.svg'
            ],
            [
                'name' => 'BBQ Area',
                'image' => '/assets/icons/BBQ.svg'
            ],
        ]);

        //add those near places in one query
        //20 Minutes to Downtown Dubai
        //16 Minutes to Dubai Marina
        //20 Minutes to Dubai International Airport

        $project3->nearPlaces()->createMany([
            [
                'name' => 'Downtown Dubai',
                'time' => '20 Minutes'
            ],
            [
                'name' => 'Dubai Marina',
                'time' => '16 Minutes'
            ],
            [
                'name' => 'Dubai International Airport',
                'time' => '20 Minutes'
            ],
        ]);


        $project3->prices()->createMany([
            [
                'configuration' => 'apartments',
                'area' => '1, 2, and 3 bedroom',
                'price' => '590000',
            ],
        ]);

        //adding those payment plans
        //10%
        //Down Payment
        //Easy Installment
        //-------------------
        //54%
        //During Construction
        //Easy Installment
        //-------------------
        //1%
        //On Handover
        //100% Completion
        //-------------------

        $project3->paymentPlans()->createMany([
            [
                'step' => 'Down Payment',
                'name' => 'Easy Installment',
                'description' => '10%',
            ],
            [
                'step' => 'During Construction',
                'name' => 'Easy Installment',
                'description' => '54%',
            ],
            [
                'step' => 'On Handover',
                'name' => '100% Completion',
                'description' => '1%',
            ],
        ]);

        $project4 = Project::query()->create([
            'name' => 'Armani Beach Residences',
            'description' => 'These beach residences offer a unique and opulent lifestyle experience, designed by the renowned Japanese architect Tadao Ando. The project presents an array of thoughtfully-designed, 1-4 bedroom premium apartments as well as world-class amentities.',
            'type' => 'compound',
            'status' => 'active',
            'cover_image' => '/assets/28.png',
            'price' => '21500000',
            'location_image' => '',
            'gps_location' => 'Palm Jumeirah',
            'address' => 'Palm Jumeirah',
        ]);

        //adding those features as one query
        //Mini theatre
        //Banquet Hall
        //Gymnasium
        //Tennis Court
        //Private Beach Access
        //Jogging Track
        //Landscaped Gardens

        $project4->features()->createMany([
            [
                'name' => 'Mini theatre',

            ],
            [
                'name' => 'Banquet Hall',

            ],
            [
                'name' => 'Gymnasium',
                'image' => '/assets/icons/Gym.svg'
            ],
            [
                'name' => 'Tennis Court',
                'image' => '/assets/icons/Tennis_Court.svg'
            ],
            [
                'name' => 'Private Beach Access',
                'image' => '/assets/icons/Beach_Access.svg'
            ],
            [
                'name' => 'Jogging Track',

            ],
            [
                'name' => 'Landscaped Gardens',
                'image' => '/assets/icons/Parks.svg'
            ],
        ]);

        //add those near places in one query
        //25 Minutes to Downtown Dubai
        //20 Minutes to Dubai Marina
        //35 Minutes to Dubai International Airport
        //40 Minutes to Al Maktoum International Airport

        $project4->nearPlaces()->createMany([
            [
                'name' => 'Downtown Dubai',
                'time' => '25 Minutes'
            ],
            [
                'name' => 'Dubai Marina',
                'time' => '20 Minutes'
            ],
            [
                'name' => 'Dubai International Airport',
                'time' => '35 Minutes'
            ],
            [
                'name' => 'Al Maktoum International Airport',
                'time' => '40 Minutes'
            ],
        ]);

        $project4->prices()->createMany([
            [
                'configuration' => 'apartments',
                'area' => '1, 2, 3, and 4 bedroom',
                'price' => '21500000',
            ],
        ]);

        //adding those payment plans
        //25%
        //Down Payment
        //On Booking Date
        //-------------------
        //35%
        //During Construction
        //Easy Installment
        //-------------------
        //40%
        //On Handover
        //100% Completion
        //-------------------

        $project4->paymentPlans()->createMany([
            [
                'step' => 'Down Payment',
                'name' => 'On Booking Date',
                'description' => '25%',
            ],
            [
                'step' => 'During Construction',
                'name' => 'Easy Installment',
                'description' => '35%',
            ],
            [
                'step' => 'On Handover',
                'name' => '100% Completion',
                'description' => '40%',
            ],
        ]);

        $project5 = Project::query()->create([
            'name' => 'Oceanz by Danube',
            'description' => 'Danube innovates in the thriving Maritime City community with a sleek and striking high-rise development. The enchanting assortment of  1-3 bedroom apartments reveal mesmerizing ocean vistas along with masterclass interior design by Tonino Lamborghini CASA.',
            'type' => 'compound',
            'status' => 'active',
            'cover_image' => '/assets/28.png',
            'price' => '1200000',
            'location_image' => '',
            'gps_location' => 'Dubai Maritime City',
            'address' => 'Dubai Maritime City',
        ]);

        //adding those features as one query
        //Aquatic Gym
        //Sky Jacuzzi
        //Floating Cinema
        //Cricket Pitch
        //Badminton Court
        //Dance Studio
        //Beauty Salon

        $project5->features()->createMany([
            [
                'name' => 'Aquatic Gym',
            ],
            [
                'name' => 'Sky Jacuzzi',
            ],
            [
                'name' => 'Floating Cinema',
            ],
            [
                'name' => 'Cricket Pitch',
            ],
            [
                'name' => 'Badminton Court',
            ],
            [
                'name' => 'Dance Studio',
            ],
            [
                'name' => 'Beauty Salon',
            ],
        ]);

        //add those near places in one query
        //8 Minutes to Jumeirah Beach
        //10 Minutes to Dubai Island Beach
        //11 Minutes to Burj Khalifa
        //15 Minutes to Dubai International Airport

        $project5->nearPlaces()->createMany([
            [
                'name' => 'Jumeirah Beach',
                'time' => '8 Minutes'
            ],
            [
                'name' => 'Dubai Island Beach',
                'time' => '10 Minutes'
            ],
            [
                'name' => 'Burj Khalifa',
                'time' => '11 Minutes'
            ],
            [
                'name' => 'Dubai International Airport',
                'time' => '15 Minutes'
            ],
        ]);

        $project5->prices()->createMany([
            [
                'configuration' => 'apartments',
                'area' => '1, 2, and 3 bedroom',
                'price' => '1200000',
            ],
        ]);

        //adding those payment plans
        //10%
        //Down Payment
        //On Booking Date
        //-------------------
        //54%
        //During Construction
        //Easy Installment
        //-------------------
        //1%
        //On Handover
        //100% Completion
        //-------------------

        $project5->paymentPlans()->createMany([
            [
                'step' => 'Down Payment',
                'name' => 'On Booking Date',
                'description' => '10%',
            ],
            [
                'step' => 'During Construction',
                'name' => 'Easy Installment',
                'description' => '54%',
            ],
            [
                'step' => 'On Handover',
                'name' => '100% Completion',
                'description' => '1%',
            ],
        ]);


        $project1 = Project::query()->create([
            'name' => 'Azizi Venice',
            'description' => 'A Water-inspired Living! The community boasts residential beauties, including studio units, luxurious 1-3-bedroom apartments, and villas with beach views.
A prime location within the Dubai South offers residents the best of both worlds. Offering effortless connectivity to the rest of the city.',
            'type' => 'apartment',
            'status' => 'active',
            'cover_image' => '/storage/projects/Azizi_Venice/cover_image/cover_image.png',
            'price' => '480000',
            'manager' => 'Azizi Developments',
            'manager_description' => 'Azizi Developments is a leading developer based in Dubai with an extensive portfolio of modern luxury residential and commercial properties across the emirate’s most sought-after locations. Our properties, through which we aim to enrich the lives of our residents and investors, cater to all lifestyles. Azizi Developments is a customer-oriented and driven company, conceived in 2007, with an initial focus on developing high-quality residential apartments in prime locations, the company has since developed into a diversified real estate developer, with a global footprint, and a wide range of lifestyle choices that meet the needs of modern-day investors.',
            'manager_image' => '/storage/projects/Azizi_Venice/cover_image/cover_image.png',
            'location_image' => '',
            'gps_location' => 'Dubai South',
            'address' => 'Dubai South',
        ]);

        //adding those features in one query
        // Swimming pools
        //GYM
        //Parks & Lesiure areas
        //Restaurants
        //Dining outlets
        //Retail outlets
        //Supermarket
        //Waterfront
        //Health care centre
        //24x7 Security
        //Sports activities
        //Kids play area

        $project1->features()->createMany([
            [
                'name' => 'Swimming pools',
                'image' => '/assets/icons/SWIMMING_POOL.svg'
            ],
            [
                'name' => 'GYM',
                'image' => '/assets/icons/Gym.svg'
            ],
            [
                'name' => 'Parks & Lesiure areas',
                'image' => '/assets/icons/Parks.svg'
            ],
            [
                'name' => 'Restaurants',
                'image' => '/assets/icons/RESTAURANTS.svg'
            ],
            [
                'name' => 'Dining outlets',
                'image' => '/assets/icons/Dining_Outlets.svg'
            ],
            [
                'name' => 'Retail outlets',
                'image' => '/assets/icons/RETAIL_OUTLETS.svg'
            ],
            [
                'name' => 'Supermarket',
                'image' => '/assets/icons/SUPERMARKET.svg'
            ],
            [
                'name' => 'Waterfront',
                'image' => '/assets/icons/Waterfront.svg'
            ],
            [
                'name' => 'Health care centre',
                'image' => '/assets/icons/Heal_care.svg'
            ],
            [
                'name' => '24x7 Security',
                'image' => '/assets/icons/24x7_Security.svg'
            ],
            [
                'name' => 'Sports activities',
                'image' => '/assets/icons/Sports.svg'
            ],
            [
                'name' => 'Kids play area',
                'image' => '/assets/icons/Kids_Area.svg'
            ],
        ]);

        //add those near places in one query
        //7 Minutes to DWC Airport
        //15 Minutes to Palm Jebel Ali
        //5 Minutes to Metro Station
        $project1->nearPlaces()->createMany([
            [
                'name' => 'DWC Airport',
                'time' => '7 Minutes'
            ],
            [
                'name' => 'Palm Jebel Ali',
                'time' => '15 Minutes'
            ],
            [
                'name' => 'Metro Station',
                'time' => '5 Minutes'
            ],
        ]);

        //adding those prices in one query
        //Studios, 1, 2, and 3 bedroom
        //apartments and villas

        $project1->prices()->createMany([
            [
                'configuration' => 'Studios',
                'area' => '1, 2, and 3 bedroom',
                'price' => '480000',
            ],
            [
                'configuration' => 'apartments',
                'area' => '1, 2, and 3 bedroom',
                'price' => '480000',
            ],
            [
                'configuration' => 'villas',
                'area' => '1, 2, and 3 bedroom',
                'price' => '480000',
            ],

        ]);

        //adding those payment plans
        //10%
        //Down Payment
        //On Booking Date
        //-------------------
        //50%
        //During Construction
        //Easy Installment
        //-------------------
        //40%
        //On Handover
        //100% Completion
        //-------------------

        $project1->paymentPlans()->createMany([
            [
                'step' => 'Down Payment',
                'name' => 'On Booking Date',
                'description' => '10%',

            ],
            [
                'step' => 'During Construction',
                'name' => 'Easy Installment',
                'description' => '50%',
            ],
            [
                'step' => 'On Handover',
                'name' => '100% Completion',
                'description' => '40%',
            ],
        ]);

        //list images from assets/storage/projects/Azizi_Venice/images
        $project_one_list_images = Storage::disk('public')->files('projects/Azizi_Venice/images');

        //add those images in one query
        foreach ($project_one_list_images as $image) {
            if ($image != '.' && $image != '..') {
                $project1->images()->create([
                    'image' => '/storage/' . $image
                ]);
            }
        }


        $project2 = Project::query()->create([
            'name' => 'Sobha One',
            'description' => 'A new development by Sobha Group that features 1 to 4-bedroom waterfront apartments located at Sobha Hartland, Dubai. Discover a life that is both rich enough to appeal to the brilliance of modernity and close enough to nature to be considered interesting and elegant.',
            'type' => 'apartment',
            'status' => 'active',
            'cover_image' => '/storage/projects/Sobha_One/cover_image/cover_image.png',
            'price' => '1500000',
            'manager' => 'Sobha Group',
            'manager_description' => 'Sobha Group is a multinational, multiproduct group with developments and investments in U.A.E., Sultanate of Oman, Qatar, Bahrain, Brunei and India. Established in 1976 by a first generation Indian entrepreneur, PNC Menon as an interior decoration firm under the name of Services and Trade Company in Muscat, Oman, the group has grown into one of the most respected names in all the countries in which it has established businesses. The organization is one of the fastest growing and foremost backward integrated real estate organizations in the region. Sobha is primarily focused on residential and contractual projects. The Company’s residential projects include presidential apartments, villas, row houses, luxury and super luxury apartments, plotted development and aspirational homes replete with world-class amenities. In all its residential projects, the company lays a strong emphasis on environmental management, water harvesting and high safety standards.',
            'manager_image' =>  '/storage/projects/Sobha_One/cover_image/cover_image.png',
            'location_image' => '',
            'gps_location' => 'Ras Al Khor',
            'address' => 'Ras Al Khor',
        ]);

        //list images from assets/storage/projects/Sobha_One/images
        $project_two_list_images = Storage::disk('public')->files('projects/Sobha_One/images');

        //add those images in one query
        foreach ($project_two_list_images as $image) {
            if ($image != '.' && $image != '..') {
                $project2->images()->create([
                    'image' => '/storage/' . $image
                ]);
            }
        }

        //adding those features in one query
        // Gymnasium
        //Kids Play Area
        //Grand Clubhouse
        //Sports Court
        //Swimming Pools
        //Landscape Garden
        //Barbecue Area
        //Sky Terrace

        $project2->features()->createMany([
            [
                'name' => 'Gymnasium',
                'image' => '/assets/icons/Gym.svg'
            ],
            [
                'name' => 'Kids Play Area',
                'image' => '/assets/icons/Kids_Area.svg'
            ],
            [
                'name' => 'Grand Clubhouse',
                'image' => '/assets/icons/Club_House.svg'
            ],
            [
                'name' => 'Sports Court',
                'image' => '/assets/icons/Sports.svg'
            ],
            [
                'name' => 'Swimming Pools',
                'image' => '/assets/icons/SWIMMING_POOL.svg'
            ],
            [
                'name' => 'Landscape Garden',
                'image' => '/assets/icons/Parks.svg'
            ],
            [
                'name' => 'Barbecue Area',
                'image' => '/assets/icons/BBQ.svg'
            ],
            [
                'name' => 'Sky Terrace',
                'image' => '/assets/icons/Sky_Terrace.svg'
            ],
        ]);

        //add those near places in one query
        //12 Minutes to Dubai International Airport
        //12 Minutes to Business Bay
        //15 Minutes to The Dubai Mall
        //15 Minutes to Burj Khalifa & Downtown Dubai
        //25 Minutes to Palm Jumeirah

        $project2->nearPlaces()->createMany([
            [
                'name' => 'Dubai International Airport',
                'time' => '12 Minutes'
            ],
            [
                'name' => 'Business Bay',
                'time' => '12 Minutes'
            ],
            [
                'name' => 'The Dubai Mall',
                'time' => '15 Minutes'
            ],
            [
                'name' => 'Burj Khalifa & Downtown Dubai',
                'time' => '15 Minutes'
            ],
            [
                'name' => 'Palm Jumeirah',
                'time' => '25 Minutes'
            ],
        ]);

        //1, 2, 3, and 4 Bedroom Apartments
        $project2->prices()->createMany([
            [
                'configuration' => 'Apartments',
                'area' => '1, 2, 3, and 4 Bedroom',
                'price' => '1500000',
            ],
        ]);

        //adding those payment plans
        //60%
        //During Construction
        //Easy Installment
        //-------------------
        //40%
        //On Handover
        //100% Completion
        //-------------------

        $project2->paymentPlans()->createMany([
            [
                'step' => 'During Construction',
                'name' => 'Easy Installment',
                'description' => '60%',
            ],
            [
                'step' => 'On Handover',
                'name' => '100% Completion',
                'description' => '40%',
            ],
        ]);

        $project3 = Project::query()->create([
            'name' => 'Sportz by Danube',
            'description' => 'Within a vibrant community, Danube Properties\' latest project is a sports-centric residential experience. The development features luxurious 1-3 bedroom apartments along with a multitude of sports and leisure integrations such as state-of-the-art fitness centers, Olympic-sized swimming pools, and much more.',
            'type' => 'apartment',
            'status' => 'active',
            'cover_image' => '/assets/28.png',
            'price' => '590000',
            'manager' => 'Danube Properties',
            'manager_description' => 'Danube Properties is a leading property developer in the UAE, established in 2014, and is part of the Danube Group, the region’s largest building materials company established in 1993. The company firmly believes that delivering on promises is not just good business but the right thing to do. The company has delivered 4,744 units to date and has a development portfolio of 6,194 units with a combined value exceeding Dh13.3 billion. The company plans to deliver 1,711 units in 2021 and 2,000 units in 2022. Danube Properties has been awarded the prestigious ISO 9001:2015 certification for Quality Management Systems and ISO 14001:2015 certification for Environmental Management Systems, and OHSAS 18001:2007 for Occupational Health and Safety Management System. The company has also been awarded the prestigious Superbrands 2021 award.',
            'manager_image' => '/assets/images/azizi-developments.jpg',
            'location_image' => '',
            'gps_location' => 'Dubai Sports City',
            'address' => 'Dubai Sports City',
        ]);

//adding those features as one query
// Sky Jacuzzi
//Daycare Center
//Floating Cinema
//Badminton Court
//Wall Climbing
//Archery
//Smart Mart
//BBQ Area

        $project3->features()->createMany([
            [
                'name' => 'Sky Jacuzzi',
                'image' => '/assets/icons/Sky_Terrace.svg'
            ],
            [
                'name' => 'Daycare Center',
                'image' => '/assets/icons/Daycare_Center.svg'
            ],
            [
                'name' => 'Floating Cinema',
            ],
            [
                'name' => 'Badminton Court',
            ],
            [
                'name' => 'Wall Climbing',

            ],
            [
                'name' => 'Archery',
            ],
            [
                'name' => 'Smart Mart',
                'image' => '/assets/icons/SUPERMARKET.svg'
            ],
            [
                'name' => 'BBQ Area',
                'image' => '/assets/icons/BBQ.svg'
            ],
        ]);
    }
}
