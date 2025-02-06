<?php

namespace App\Http\Middleware;

use App\Models\AboutUs;
use App\Models\FrontSetting;
use App\Models\HomeSection;
use App\Models\LandingPageSection;
use App\Models\Utility;
use Closure;
use Illuminate\Support\Facades\Schema;

class XSS
{
    use \RachidLaasri\LaravelInstaller\Helpers\MigrationsHelper;

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(\Auth::check())
        {
            \App::setLocale(\Auth::user()->lang);

//            if(\Auth::user()->type == 'super admin')
//            {
//                if(Schema::hasTable('ch_messages'))
//                {
//
//                    if(Schema::hasColumn('ch_messages', 'type') == false)
//                    {
//
//                        Schema::drop('ch_messages');
//                        \DB::table('migrations')->where('migration', 'like', '%ch_messages%')->delete();
//                    }
//                }
//
//                $migrations = $this->getMigrations();
//                $dbMigrations           = $this->getExecutedMigrations();
//                $numberOfUpdatesPending = (count($migrations)+6) - count($dbMigrations);
//
//                if($numberOfUpdatesPending > 0)
//                {
//                    // run code like seeder only when new migration
//                    Utility::addNewData();
//                    return redirect()->route('LaravelUpdater::welcome');
//                }
//
//                $landingData = LandingPageSection::all()->count();
//                if($landingData == 0)
//                {
//                    Utility::add_landing_page_data();
//                }
//            }
        }
        // In a seeder or middleware
        HomeSection::firstOrCreate([
            'title' => 'Default Title',
            'title_ar' => 'عنوان افتراضي',
            'description' => 'Default description',
            'description_ar' => 'وصف افتراضي',
        ]);
        AboutUs::firstOrCreate([
            'title' => 'Default Title',
            'title_ar' => 'عنوان افتراضي',
            'description' => 'Default description',
            'description_ar' => 'وصف افتراضي',
        ]);


        // Ensure a default FrontSetting exists
        FrontSetting::firstOrCreate([
            'address'   => 'Default Address',
            'email'     => 'default@example.com',
            'twitter'   => 'https://twitter.com/default',
            'instagram' => 'https://instagram.com/default',
            'facebook'  => 'https://facebook.com/default',
            'linkedin'  => 'https://linkedin.com/default',
            'phone'     => '000-000-0000',
            'map'     => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d463879.6380948855!2d47.15218084420127!3d24.724831559335883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f03890d489399%3A0xba974d1c98e79fd5!2z2KfZhNix2YrYp9i2INin2YTYs9i52YjYr9mK2Kk!5e0!3m2!1sar!2seg!4v1738793399926!5m2!1sar!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        ]);



        return $next($request);
    }
}
