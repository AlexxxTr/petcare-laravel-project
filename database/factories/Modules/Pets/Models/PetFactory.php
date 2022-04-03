<?php

namespace Database\Factories\Modules\Pets\Models;

use App\Modules\Pets\Models\Pet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PetFactory extends Factory
{
    protected $model = Pet::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "type" => $this->faker->randomElement(["dog", "cat", "bird"]),
            "name" => $this->faker->firstName(),
            "house_id" => $this->faker->numberBetween(1, 5)
        ];
    }
}
