<?php

namespace Database\Seeders;

use App\Models\FoodOrder;
use Illuminate\Database\Seeder;

class FoodOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FoodOrder::factory()
            ->count(5)
            ->create();
    }
}
