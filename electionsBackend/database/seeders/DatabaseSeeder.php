<?php

namespace Database\Seeders;

use App\Models\Bulletin;
use App\Models\Participant;
use App\Models\Region;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Region::factory(20)->create();
        Participant::factory(20)->create();
        Bulletin::factory(20)->create();
    }
}
