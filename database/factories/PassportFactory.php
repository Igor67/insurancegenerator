<?php

namespace Database\Factories;

use App\Models\Passport;
use Illuminate\Database\Eloquent\Factories\Factory;

class PassportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Passport::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'number' => $this->faker->creditCardNumber
        ];
    }
}
