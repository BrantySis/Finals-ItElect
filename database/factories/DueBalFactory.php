<?php

// database/factories/DueBalanceFactory.php

namespace Database\Factories;

use App\Models\DueBal;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

class DueBalFactory extends Factory
{
    protected $model = DueBal::class;

    public function definition()
    {
        return [
            'tenant_id' => Tenant::factory(), // Ensure this relationship exists
            'amount_due' => $this->faker->randomFloat(2, 1000, 5000),
            'due_date' => $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
            'status' => 'pending',
        ];
    }
}

