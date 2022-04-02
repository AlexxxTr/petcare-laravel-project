<?php

namespace Database\Factories;

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
            "type" => $this->sequence(["bird", "dog", "cat"]),
            "name" => $this->faker->firstName(),
            "house_id" => $this->sequence([1, 2, 3, 4, 5])
        ];
    }
}
