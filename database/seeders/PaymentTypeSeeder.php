<?php

namespace Database\Seeders;

use App\Models\PaymentType;
use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentType::updateOrCreate (['name' => 'Cash'], ['name' => 'Cash', 'commission_rate' => 0]);
        PaymentType::updateOrCreate (['name' => 'Due'], ['name' => 'Due', 'commission_rate' => 0]);
        PaymentType::updateOrCreate (['name' => 'Bkash'], ['name' => 'Bkash', 'commission_rate' => 0]);
        PaymentType::updateOrCreate (['name' => 'Rocket'], ['name' => 'Rocket', 'commission_rate' => 0]);
        PaymentType::updateOrCreate (['name' => 'Nagad'], ['name' => 'Nagad', 'commission_rate' => 0]);
        PaymentType::updateOrCreate (['name' => 'Sure Cash'], ['name' => 'Sure Cash', 'commission_rate' => 0]);
        PaymentType::firstOrCreate (['name' => 'DBBL Card'], ['name' => 'DBBL Card', 'commission_rate' => 0]);
        PaymentType::updateOrCreate (['name' => 'EBL Card'], ['name' => 'EBL Card', 'commission_rate' => 0]);
    }
}
