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
        ]);



        return $next($request);
    }
}
