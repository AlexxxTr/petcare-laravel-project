<?php

namespace Database\Factories\Modules\Pets\Models;

use App\Modules\Pets\Models\Medicine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MedicineFactory extends Factory
{
    protected $model = Medicine::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => $this->faker->lastName(),
            "description" => $this->faker->text(40),
            "house_id" => $this->faker->numberBetween(1, 5)
        ];
    }
}
