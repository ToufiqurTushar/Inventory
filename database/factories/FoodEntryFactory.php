<?php

namespace Database\Factories;

use App\Models\FoodEntry;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class FoodEntryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FoodEntry::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->text(255),
            'production_cost' => $this->faker->randomNumber(2),
            'sale_cost' => $this->faker->randomNumber(2),
            'member_discount' => $this->faker->randomNumber(2),
            'special_discount' => $this->faker->randomNumber(2),
            'others_discount' => $this->faker->randomNumber(2),
            'created_by_id' => $this->faker->randomNumber,
        ];
    }
}
