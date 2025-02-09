<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use App\Models\Client;
use App\Models\Feature;
use App\Models\FrontSetting;
use App\Models\HomeSection;
use App\Models\WhyUs;
use Illuminate\Database\Seeder;

class LandingPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $home = [
            [
                'title' => 'Default Title',
                'description' => 'Default description',
                'image' => 'default.jpg',
                'title_ar' => 'عنوان افتراضي',
                'description_ar' => 'وصف افتراضي',
            ],
            // insert more Home contents here for seeding
        ];

        HomeSection::query()->insert($home);

        $about = [
            [
                'title' => 'Default Title',
                'description' => 'Default description',
                'title_ar' => 'عنوان افتراضي',
                'description_ar' => 'وصف افتراضي',
            ],
            // insert more AboutUs contents here for seeding
        ];

        AboutUs::query()->insert($about);

        $frontSetting = [
            [
                'address' => 'Default Address',
                'email' => 'default@example.com',
                'twitter' => 'https://twitter.com/default',
                'instagram' => 'https://instagram.com/default',
                'facebook' => 'https://facebook.com/default',
                'linkedin' => 'https://linkedin.com/default',
                'phone' => '000-000-0000',
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d463879.6380948855!2d47.15218084420127!3d24.724831559335883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f03890d489399%3A0xba974d1c98e79fd5!2z2KfZhNix2YrYp9i2INin2YTYs9i52YjYr9mK2Kk!5e0!3m2!1sar!2seg!4v1738793399926!5m2!1sar!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            ],
            // add more Front Settings here for seeding
        ];

        FrontSetting::query()->insert($frontSetting);

        $client = [
            [
                'name' => 'Client 1',
                'email' => 'client1@example.com',
                'phone' => '123-456-7890',
                'image' => 'client-1.png',
                'address' => 'Client 1 Address',
            ],
            [
                'name' => 'Client 2',
                'email' => 'client2@example.com',
                'phone' => '123-456-7890',
                'image' => 'client-2.png',
                'address' => 'Client 2 Address',
            ],
            [
                'name' => 'Client 3',
                'email' => 'client3@example.com',
                'phone' => '123-456-7890',
                'image' => 'client-3.png',
                'address' => 'Client 3 Address',
            ],
            [
                'name' => 'Client 4',
                'email' => 'client4@example.com',
                'phone' => '123-456-7890',
                'image' => 'client-4.png',
                'address' => 'Client 4 Address',
            ],
        ];

        Client::query()->insert($client);

        $features = [
            [
                'icon' => 'fa-star',
                'title' => 'High Quality',
                'title_ar' => 'جودة عالية',
                'description' => 'We provide high-quality services.',
                'description_ar' => 'نحن نقدم خدمات عالية الجودة.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fa-check',
                'title' => 'Trusted Service',
                'title_ar' => 'خدمة موثوقة',
                'description' => 'Our services are trusted by many.',
                'description_ar' => 'خدماتنا موثوقة من قبل الكثيرين.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // add more features here for seeding
        ];

        Feature::query()->insert($features);

        $whyus = [
            [
                'title' => 'Why Choose Us?',
                'title_ar' => 'لماذا تختارنا؟',
            ],
        ];

        WhyUs::query()->insert($whyus);
    }
}
