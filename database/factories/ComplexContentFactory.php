<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ComplexContent>
 */
class ComplexContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lang' => 'en',
            'name' => fake()->words(2, true),
            'description' => fake()->paragraph(),
        ];
    }
}
