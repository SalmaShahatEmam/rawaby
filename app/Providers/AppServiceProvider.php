<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\BlogUsers;
use App\Models\User;
use App\Observers\BlogObserver;
use App\Settings\GeneralSettings;
use App\Observers\BlogUsersObserver;
use Illuminate\Support\ServiceProvider;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {


      //   Blog::observe(BlogObserver::class);
       // BlogUsers::observe(BlogUsersObserver::class);



        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['ar','en']); // also accepts a closure
        });

        $setting = app(GeneralSettings::class);

        $composeViewWithSettings = function ($view) use ($setting) {
            $view->with('setting', $setting);

        };

        view()->composer('site.layouts.navbar', $composeViewWithSettings);
        view()->composer('site.contact', $composeViewWithSettings);

        // Views that need both the setting and services
        view()->composer('site.layouts.footer', $composeViewWithSettings);
        view()->composer('site.home', $composeViewWithSettings);
        view()->composer('site.about', $composeViewWithSettings);

    }
}
