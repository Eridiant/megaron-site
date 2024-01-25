<?php

namespace App\Services\Localization;

class Localization
{
    public function locale(): string
    {
        $locale = request()->segment(1, '');
        // dd(app('langs'));

        if ($locale && array_key_exists($locale, app('langs')) && !app('langs')[$locale]["default"]) {
            return $locale;
        }

        return "";
    }
}