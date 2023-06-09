<?php

namespace App\Providers;

use App\Models\Program;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $settings = Setting::checkSettings();
      
        //User::checkSuperAdmin();
        View()->share([
            'settings' => $settings,
            
        ]);
    }
}
