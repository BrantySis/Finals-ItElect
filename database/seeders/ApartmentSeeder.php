<?php

// database/seeders/ApartmentSeeder.php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Room;
use App\Models\Tenant;
use App\Models\DueBal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class ApartmentSeeder extends Seeder
{
    public function run(): void
    {
        Apartment::factory()
            ->count(5)
            ->sequence(fn($sequence) => ['name' => 'Apartment ' . ($sequence->index + 1)])
            ->has(
                Room::factory()
                    ->count(3)
                    ->state(
                        new Sequence(
                            ['room_number' => 'Room 1'],
                            ['room_number' => 'Room 2'],
                            ['room_number' => 'Room 3']
                        )
                    )
                    ->has(
                        Tenant::factory()
                            ->count(1)
                            ->state(fn(array $attributes, Room $room) => ['room_id' => $room->id])
                            ->afterCreating(function (Tenant $tenant) {
                                // Create a DueBalance for each tenant
                                DueBal::factory()->create([
                                    'tenant_id' => $tenant->id,
                                ]);
                            })
                    )
            )
            ->create();
    }
}




