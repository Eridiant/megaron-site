<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Language::factory()
            ->count(2)
            ->sequence(
                ['name' => 'English', 'key' => 'en-US', 'code' => 'en', 'default' => '1'],
                ['name' => 'Русский', 'key' => 'ru-RU', 'code' => 'ru', 'default' => '0'],
            )
            ->create();
    }
}
