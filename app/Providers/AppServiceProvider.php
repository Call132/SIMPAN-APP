<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        // Spatie Settings handles instances natively, but explicitly binding as requested:
        $this->app->singleton(\App\Settings\PantiSettings::class, function () {
            // we must let Spatie resolve it by not overwriting its abstract binding, 
            // but just returning a new or its existing binding isn't strictly necessary in v3.
            return new \App\Settings\PantiSettings();
        });
    }
}
