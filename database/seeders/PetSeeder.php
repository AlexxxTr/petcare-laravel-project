<?php

namespace Database\Seeders;

use App\Modules\Pets\Models\Administration;
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
        Pet::factory()->count(10)->hasPicture()->hasAdministration(2)->create();
    }
}
