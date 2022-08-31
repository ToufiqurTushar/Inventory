<?php

namespace Database\Seeders;

use App\Models\MemberType;
use Illuminate\Database\Seeder;

class MemberTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MemberType::factory()
            ->count(5)
            ->create();
    }
}
