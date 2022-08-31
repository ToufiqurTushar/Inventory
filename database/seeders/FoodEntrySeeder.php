<?php

namespace Database\Seeders;

use App\Models\FoodEntry;
use Illuminate\Database\Seeder;

class FoodEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FoodEntry::factory()
            ->count(5)
            ->create();
    }
}
