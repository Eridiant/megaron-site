<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Models\Apartment;

class ApartmentsController extends Controller
{
    public function apartments(Request $request)
    {

        $perPage = 6;

        // dd($request->input('page'));
        // $apartments = Apartment::with('content')->where('status', '>', 8)->get();
        $query = Apartment::query()->where('status', '>', 8);

        if ($estate = $request->input('estate')) {
            $query->where('property_type', $estate); //property_type is number $estate is string
        }

        if ($status = $request->input('status')) {
            $query->where('type', $status); //type is number $status is string
        }

        if ($bedrooms = $request->input('bedrooms')) {
            $query->where('number_of_bedrooms', $bedrooms);
        }

        // if ($sity = $request->input('sity')) {
        //     $query->where('complex.city.tentativeName', $sity);
        //     // $query->where('complex.neighborhood.', $sity); // 
        // }

        $apartments = $query->paginate($perPage);

        $nextPageUrl = $apartments->nextPageUrl();

        if ($request->isJson()){
            return response()->json(['html' => view('frontend.apartments.apartments._apartments', [
                // 'user' => User::findOrFail($id)
                'apartments' => $apartments,
                'nextPageUrl' => $nextPageUrl,
                'nextPageNum' => $apartments->currentPage() + 1
            ])->render()]);
        }

        return view('frontend.apartments.apartments', [
            // 'user' => User::findOrFail($id)
            'apartments' => $apartments,
            'nextPageUrl' => $nextPageUrl,
            'nextPageNum' => $apartments->currentPage() + 1
        ]);
    }

    public function show(Request $request)
    {
        return view('frontend.apartments.show', [
            'apartment' => Apartment::findOrFail($request->id)
        ]);
    }
}
