<?php

namespace Database\Seeders;

use App\Models\StockIn;
use Illuminate\Database\Seeder;

class StockInSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StockIn::factory()
            ->count(5)
            ->create();
    }
}
