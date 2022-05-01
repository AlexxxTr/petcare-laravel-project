<?php

namespace Database\Seeders;

use App\Modules\Pets\Models\Pet;
use App\Modules\Pets\Models\Picture;
use Illuminate\Database\Seeder;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pet::factory()->count(5)->create();
        Picture::factory()->count(5)->create();
    }
}
