<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteController extends Controller
{
    public function index(): View
    {
        return view('frontend.site.index', [
            // 'user' => User::findOrFail($id)
            'user' => 'xuser'
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
        return view('frontend.site.guide', [
            // 'user' => User::findOrFail($id)
            'user' => 'xuser'
        ]);
    }
}
