<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Language;

class SetLocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = Cookie::get('locale'); // dd($locale);

        if (!$lang = $request->query('lang')) {
            App::setLocale($locale);
            return $next($request);
        }

        $langs = Language::where('active', 1)->pluck("code")->toArray();
        // dd($langs);

        if (!in_array($lang, $langs)) {
            abort(400);
        }

        App::setLocale($lang);

        Cookie::queue(Cookie::make('locale', $lang, 365*24*60*60));

        // App::setLocale($locale);

        return $next($request);
    }
}
