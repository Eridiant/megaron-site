<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Neighborhood;
use App\Models\Translation;

class NeighborhoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Neighborhood::factory(20)
            ->has(Translation::factory()
                    ->count(2)
                    ->sequence(
                        ['locale' => 'ru', 'column_name' => 'name'],
                        ['locale' => 'en', 'column_name' => 'name'],
                    )
                )
            ->create();
    }
}
