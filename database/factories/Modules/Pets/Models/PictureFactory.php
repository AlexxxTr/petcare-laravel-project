<?php

namespace Database\Factories\Modules\Pets\Models;

use App\Modules\Pets\Models\Picture;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PictureFactory extends Factory
{
    protected $model = Picture::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "pet_id" => $this->faker->numberBetween(1, 5),
            "image_path" => 'images/' . $this->faker->image(storage_path('app/public/images'), 50, 50, fullPath: false)
        ];
    }
}
