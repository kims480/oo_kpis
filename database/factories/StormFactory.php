<?php

namespace Database\Factories;

use App\Models\Storm;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class StormFactory extends Factory
{
    protected $model = Storm::class;

    public function definition(): array
    {
        return [
            'Name' => $this->faker->name(),
            'phone_number' => $this->faker->phoneNumber(),
            'active' => $this->faker->boolean(),
            'notes' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
