<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\City;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Neighborhood>
 */
class NeighborhoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => Str::slug($this->faker->state),
            'city_id' => City::factory(),
            'image' => "neighborhood/default-{$this->faker->numberBetween(1, 16)}.jpg",
        ];
    }
}
