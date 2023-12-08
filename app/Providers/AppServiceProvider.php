<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Apartment;
use App\Observers\ApartmentObserver;

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
        Apartment::observe(ApartmentObserver::class);

        $this->loadMigrationsFrom([
            'database/migrations',
        ]);
    }
}
