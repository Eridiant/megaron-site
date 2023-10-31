<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PropertiesController extends Controller
{
    public function properties(): View
    {
        return view('frontend.properties.properties', [
            // 'user' => User::findOrFail($id)
            'user' => 'xuser'
        ]);
    }

    public function show($slug): View
    {
        return view('frontend.properties.show', [
            // 'user' => User::findOrFail($id)
            'slug' => $slug
        ]);
    }
}
