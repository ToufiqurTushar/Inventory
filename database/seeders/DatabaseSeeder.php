<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('12345678'),
            ]);
        $this->call(PermissionsSeeder::class);
        //$this->call(CustomerSeeder::class);
        //$this->call(FoodEntrySeeder::class);
        //$this->call(FoodOrderSeeder::class);
        //$this->call(MemberSeeder::class);
        //$this->call(MemberTypeSeeder::class);
        //$this->call(StockInSeeder::class);
        //$this->call(UserSeeder::class);

    }
}
