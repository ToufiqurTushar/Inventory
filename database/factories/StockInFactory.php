<?php

namespace Database\Factories;

use App\Models\StockIn;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockInFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StockIn::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->text(255),
            'created_by_id' => $this->faker->randomNumber,
            'Product_type' => $this->faker->text(255),
            'expiry_days' => $this->faker->randomNumber(0),
            'initial_stock' => $this->faker->randomNumber(2),
            'alerm_stock' => $this->faker->randomNumber(2),
            'm_by_u' => $this->faker->text(255),
            'product_image' => $this->faker->text(255),
        ];
    }
}
