<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EstateType;

class EstateTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EstateType::factory()
            ->count(4)
            ->sequence(
                ['name' => 'flat'],
                ['name' => 'villa'],
                ['name' => 'penthouse'],
                ['name' => 'commercial'],
            )
            ->create();
    }
}
