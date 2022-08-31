<?php

namespace Database\Factories;

use App\Models\MemberType;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MemberType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(255),
            'name_bn' => $this->faker->text(255),
        ];
    }
}
