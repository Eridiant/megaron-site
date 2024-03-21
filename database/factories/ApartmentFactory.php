<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Complex;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Apartment>
 */
class ApartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'name' => $this->faker->word,
            // 'description' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'complex_id' => Complex::factory(),
            'number_of_rooms' => $this->faker->numberBetween(1, 5),
            'number_of_bedrooms' => $this->faker->numberBetween(1, 3),
            'number_of_bathrooms' => $this->faker->numberBetween(1, 2),
            'cost' => $this->faker->randomFloat(2, 100000, 1000000),
            'total_area' => $this->faker->numberBetween(50, 200),
            'living_area' => $this->faker->numberBetween(30, 150),
            // 'property_type' => $this->faker->randomElement(['apartment', 'house', 'villa']),
            'property_type' => $this->faker->numberBetween(1, 3),
            'type' => $this->faker->randomElement(['rent', 'sale']),
            'image' => "apartment/default-{$this->faker->numberBetween(1, 16)}.jpg",
            // 'common_video' => ['path/to/video.mp4'],
            // 'media' => ['path/to/image1.jpg', 'path/to/image2.jpg'],
            'status' => 9,
            'rank' => $this->faker->randomFloat(1, 1, 9.9),
        ];
    }
}
