<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Complex;
use App\Models\ComplexContent;

class ComplexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Complex::factory(10)
        ->has(ComplexContent::factory()
                ->count(2)
                ->sequence(
                    ['lang' => 'ru'],
                    ['lang' => 'en'],
                )
            )
        ->create();
    }
}
