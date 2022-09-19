<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::updateOrCreate([
            'email' => 'admin@traveltech.digital',
        ],[
            'email' => 'admin@traveltech.digital',
            'password' => \Hash::make('12345678'),
        ]);

        $this->call(PaymentTypeSeeder::class);
        $this->call(PermissionsSeeder::class);


    }
}
