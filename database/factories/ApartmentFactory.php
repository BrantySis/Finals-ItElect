<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Apartment;


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
            'name' => 'Apartment ' . $this->faker->unique()->numberBetween(1, 5), // Static "Apartment 1" to "Apartment 5"
            'address' => "123 Main St, Sample City, Country", // Same address for all apartments
        
        ];
    }
}
