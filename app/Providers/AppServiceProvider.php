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
        $this->app->bind('Localization', 'App\Services\Localization\Localization');

        $this->app->singleton('langs', function () {
            // $langs = Language::where('active', 1)->pluck("code", "default");
            // $languages = Language::where('active', 1)->get()->map(function ($language) {
            //     return ['code' => $language->code, 'default' => $language->default, 'current' => $language->code == app()->getLocale() ? 'selected' : ''];
            // });
            // dd(app()->getLocale());

            $languages = Language::where('active', 1)->get()->mapWithKeys(function ($language) {
                return [
                    $language->code => [
                        'default' => $language->default,
                        // 'current' => $language->code == app()->getLocale() ? 'selected' : '',
                    ],
                ];
            })->all();

            // $selectedLang = [];
            // foreach ($langs as $lang) {
            //     $isSelected = $lang == app()->getLocale() ? 'selected' : '';
            //     $selectedLang[] = [$lang, $isSelected];
            // }
            // dd($selectedLang);die;
            return $languages;
        });
        // dd(app()->getLocale());
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            // $langs = Language::where('active', 1)->pluck("code")->toArray();
            // $selectedLang = [];
            // foreach ($langs as $lang) {
            //     $isSelected = $lang == app()->getLocale() ? 'selected' : '';
            //     $selectedLang[] = [$lang, $isSelected];
            // }
            $view->with('langs', app('langs'));
        });

        Apartment::observe(ApartmentObserver::class);

        $this->loadMigrationsFrom([
            'database/migrations',
        ]);
    }
}
