<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Complex;
use App\Models\Language;

class ComplexContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $complexes = Complex::all();

        $languages = Language::select('code')->get();

        foreach ($complexes as $complex) {
            foreach ($languages as $lang) {
                DB::table('complex_content')->insert([
                    'complex_id' => $complex->id,
                    'lang' => $lang->code,
                    'name' => fake()->words(2, true),
                    'description' => fake()->paragraph(),
                ]);
            }
        }
    }
}
