<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::factory()
            ->count(4)
            ->sequence(
                ['slug' => 'dubay'],
                ['slug' => 'abu-dhabi'],
                ['slug' => 'adzhman'],
                ['slug' => 'sharjah'],
            )
            ->create();
    }
}
