<?php

namespace Database\Seeders;

use App\Modules\Pets\Models\Administration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdministrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Administration::factory()->count(5)->create();
    }
}
