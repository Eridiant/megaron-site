<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\EstateType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LanguageSeeder::class,
            EstateTypeSeeder::class,
            CitySeeder::class,
            NeighborhoodSeeder::class,
            DeveloperSeeder::class,
            ComplexSeeder::class,
            ApartmentSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
