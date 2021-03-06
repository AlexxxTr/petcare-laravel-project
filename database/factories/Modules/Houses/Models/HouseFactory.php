<?php

namespace Database\Factories\Modules\Houses\Models;

use App\Modules\Houses\Models\House;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HouseFactory extends Factory
{
    protected $model = House::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name(),
            "owner" => $this->faker->numberBetween(1, 5)
        ];
    }
}
