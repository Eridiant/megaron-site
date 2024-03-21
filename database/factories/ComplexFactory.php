<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\City;
use App\Models\Developer;
use App\Models\Neighborhood;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Complex>
 */
class ComplexFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => $this->faker->slug,
            'city_id' => City::factory(),
            'developer_id' => Developer::factory(),
            'neighborhood_id' => Neighborhood::factory(),
            'image' => "complex/default-{$this->faker->numberBetween(1, 15)}.jpg",
            'status' => 9,
            'delivery_date' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'types' => $this->generateRandomArray(),
        ];
    }


    /**
     * @return string
     */
    private function generateRandomArray(): string
    {
        // $faker = \Faker\Factory::create();
        $length = $this->faker->numberBetween(2, 5);
        $result = [];

        for ($i = 0; $i < $length; $i++) {
            $number = $this->faker->numberBetween(1, 10);
            $result[] = (string) $number;
        }

        return json_encode($result);
    }
}
