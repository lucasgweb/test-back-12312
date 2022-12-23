<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaintenanceFactory extends Factory
{
    public function definition(): array
    {
        $status = rand(0,1);

        return [
                 'vehicle_id' => Vehicle::all()->random(),
                 'date' => ($status == 1)? date('Y-m-d') :date('Y-m-d', strtotime(now()."+".rand(1,8). " days")),
                 'status' => $status,
                 'description' => fake()->text(150),
                 'coust' => fake()->randomFloat(2,100,1000),
                 'user_id' => 1,
                 'odometer' => fake()->numberBetween(10000,100000)
        ];
    }
}
