<?php

namespace Database\Factories;

use App\Models\Govern;
use App\Models\Site;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SiteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */

    protected $model=Site::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'site_id' =>  Str::random(6),
            'lat' => $this->faker->randomFloat(4,13,26),
            'long' => $this->faker->randomFloat(4,13,26),
            'nis'=>  Str::random(6),
            'prio'=> rand(1,9),
            'type'=>rand(1,2),
            'categ'=>rand(1,3),
            'govern_id'=> rand(1,5),
            'wilayat_id'=>rand(1,5),
            'office_id'=>rand(1,5),
            'added_by'=>1,
            'address'=> $this->faker->address()
        ];
    }
}
