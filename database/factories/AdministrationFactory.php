<?php

namespace Database\Factories;

use App\Modules\Pets\Models\Administration;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AdministrationFactory extends Factory
{
    protected $model = Administration::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "pet_id" => $this->faker->numberBetween(1,5),
            "date" => $this->faker->dateTimeBetween('now', '+3 weeks')->format('Y-m-d'),
            "meal" => $this->sequence(['breakfast', 'lunch', 'dinner']),
            "notes" => $this->faker->text(20),
            "medicine_id" => $this->faker->numberBetween(1, 5)
        ];
    }
}
