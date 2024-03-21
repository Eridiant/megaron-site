<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Complex;
use App\Models\Language;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apartments = Complex::all();

        $languages = Language::select('code')->get();

        foreach ($apartments as $apartment) {
            foreach ($languages as $lang) {
                DB::table('translations')->insert([
                    'complex_id' => $apartment->id,
                    'lang' => $lang->code,
                    'name' => fake()->words(2, true),
                    'description' => fake()->paragraph(),
                ]);
            }
        }
    }
}
