<?php

namespace App\Observers;

use Illuminate\Support\Facades\DB;
use App\Models\Apartment;
use App\Models\Neighborhood;
use App\Models\Complex;

class ApartmentObserver
{
    /**
     * Handle the Apartment "created" event.
     */
    public function created(Apartment $apartment): void
    {
        $this->updateNeighborhood($apartment);

        $this->updateComplex($apartment);
    }

    /**
     * Handle the Apartment "updated" event.
     */
    public function updated(Apartment $apartment): void
    {
        $this->updateNeighborhood($apartment);

        $this->updateComplex($apartment);

    }

    /**
     * Handle the Apartment "deleted" event.
     */
    public function deleted(Apartment $apartment): void
    {
        $this->updateNeighborhood($apartment);

        $this->updateComplex($apartment);
    }

    /**
     * Handle the Apartment "restored" event.
     */
    public function restored(Apartment $apartment): void
    {
        //
    }

    /**
     * Handle the Apartment "force deleted" event.
     */
    public function forceDeleted(Apartment $apartment): void
    {
        //
    }

    protected function updateNeighborhood(Apartment $apartment): void
    {
        $neighborhood_id = $apartment->complex->neighborhood->id;

        $count = DB::table('neighborhoods as neighborhood')
            ->rightJoin('complexes as complex', 'complex.neighborhood_id', '=', 'neighborhood.id')
            ->rightJoin('apartments as apartment', 'apartment.complex_id', '=', 'complex.id')
            ->where('neighborhood.id', $neighborhood_id)
            ->where('apartment.status', '>', 8)
            ->count('apartment.id');

        $neighborhood = Neighborhood::find($neighborhood_id);
        $neighborhood->offers = $count;
        $neighborhood->save();
    }

    protected function updateComplex(Apartment $apartment): void
    {
        $complex_id = $apartment->complex->id;

        $min_price = DB::table('complexes as complex')
            ->rightJoin('apartments as apartment', 'apartment.complex_id', '=', 'complex.id')
            ->where('complex.id', $complex_id)
            ->where('apartment.status', '>', 8)
            ->where('apartment.cost', '>', 0)
            ->min('apartment.cost');

        $neighborhood = Complex::find($complex_id);
        $neighborhood->min_price = $min_price;
        $neighborhood->save();
    }
}
