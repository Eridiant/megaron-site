<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AuctionController extends Controller
{
    public function auction(): View
    {
        return view('frontend.auction.auction', [
            // 'user' => User::findOrFail($id)
            'user' => 'xuser'
        ]);
    }
}
