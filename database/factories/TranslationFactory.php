<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Translation>
 */
class TranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'translatable_type' => fake()->word(),
            // 'translatable_id' => '1',
            // 'column_name' => fake()->,
            'locale' => 'en',
            'value' => fake()->word(),
        ];
    }
}
