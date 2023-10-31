<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function news(): View
    {
        return view('frontend.news.news', [
            // 'user' => User::findOrFail($id)
            'user' => 'xuser'
        ]);
    }
}
