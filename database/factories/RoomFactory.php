<?php

// database/factories/RoomFactory.php

namespace Database\Factories;

use App\Models\Apartment;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    protected $model = Room::class;

    public function definition()
    {
        return [
            'apartment_id' => Apartment::factory(),  // Associate room with an apartment
            'room_number' => $this->faker->randomElement(['Room 1', 'Room 2', 'Room 3']),
            'availability' => $this->faker->boolean, // Randomly assign availability status
        ];
    }
}
