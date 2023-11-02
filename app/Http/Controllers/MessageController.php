<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'phone' => 'required|max:255',
        ]);

        $communicate = [];

        if (!empty($request->input('call')))
            $communicate[] = 'call';

        if (!empty($request->input('whatsapp')))
            $communicate[] = 'whatsapp';

        if (!empty($request->input('telegram')))
            $communicate[] = 'telegram';

        $suspicion = 0;
        if (!isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
            $suspicion += 2;
        if (!isset($_SERVER['GEOIP_COUNTRY_CODE']))
            $suspicion++;
        if (!isset($_SERVER['GEOIP_CITY']))
            $suspicion++;
        if (empty(trim($_SERVER['HTTP_USER_AGENT'])))
            $suspicion += 2;
        if (!empty($request->input('message')))
            $suspicion += 2;

        $communicateString = implode(', ', $communicate);

        $message = Message::create([
            'phone' => $validatedData['phone'],
            'communicate' => $communicateString,
            'ip' => inet_pton($request->ip()),
            'spam' => $suspicion,
        ]);

        $responseSuccess = view('frontend.partials._success')->render();

        return response()->json(['success' => 1, 'render' => $responseSuccess], 201);
    }
}
