<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->word,
            'mid_name' => $this->faker->word,
            'last_name' => $this->faker->word,
            // 'last_name' => $this->faker->word,
            // 'last_name' => $this->faker->word,
            // 'last_name' => $this->faker->word,
            // 'last_name' => $this->faker->word,
            // 'last_name' => $this->faker->word,

            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
