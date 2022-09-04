<?php

namespace Database\Factories;

use App\Models\FoodOrder;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class FoodOrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FoodOrder::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quantity' => $this->faker->randomNumber(2),
            'discount' => $this->faker->randomNumber(2),
            'created_by_id' => $this->faker->randomNumber,
            'price' => $this->faker->randomNumber(2),
            'mobile' => $this->faker->phoneNumber,
            'menu_names' => [],
        ];
    }
}
