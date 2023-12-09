<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Apartment;
use App\Models\Language;
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
        View::composer('*', function ($view) {
            $langs = Language::where('active', 1)->pluck("code")->toArray();
            $selectedLang = [];
            foreach ($langs as $lang) {
                $isSelected = $lang == app()->getLocale() ? 'selected' : '';
                $selectedLang[] = [$lang, $isSelected];
            }
            $view->with('langs', $selectedLang);
        });

        Apartment::observe(ApartmentObserver::class);

        $this->loadMigrationsFrom([
            'database/migrations',
        ]);
    }
}
