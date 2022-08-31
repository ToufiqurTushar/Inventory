<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Member::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'card_no' => $this->faker->text(255),
            'customer_id' => \App\Models\Customer::factory(),
            'member_type_id' => \App\Models\MemberType::factory(),
        ];
    }
}
