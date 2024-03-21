<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Apartment;
use App\Models\ApartmentContent;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Apartment::factory(20)
        ->has(ApartmentContent::factory()
                ->count(2)
                ->sequence(
                    ['lang' => 'ru'],
                    ['lang' => 'en'],
                )
            )
        ->create();
    }
}
