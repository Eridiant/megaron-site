<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ComplexesController extends Controller
{
    public function apartments(): View
    {
        return view('frontend.apartments.apartments', [
            // 'user' => User::findOrFail($id)
            'user' => 'xuser'
        ]);
    }
}
