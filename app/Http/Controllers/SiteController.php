<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Apartment;
use App\Models\Complex;
use App\Models\Neighborhood;

class SiteController extends Controller
{
    public function index(): View
    {
        $neighborhoods = Neighborhood::with('trname')->get();
        $complexes = Complex::with('content')->where('status', '>', 8)->get();
        $apartments = Apartment::with('content')->where('status', '>', 8)->get();

        return view('frontend.site.index', [
            'neighborhoods' => $neighborhoods,
            'apartments' => $apartments,
            'complexes' => $complexes,
        ]);
    }

    public function about(): View
    {
        return view('frontend.site.about', [
            // 'user' => User::findOrFail($id)
            'user' => 'xuser'
        ]);
    }

    public function contacts(): View
    {
        return view('frontend.site.contacts', [
            // 'user' => User::findOrFail($id)
            'user' => 'xuser'
        ]);
    }

    public function guide(): View
    {
        $apartments = Apartment::with('content')->where('status', '>', 8)->get();

        return view('frontend.site.guide', [
            'apartments' => $apartments,
        ]);
    }
}
