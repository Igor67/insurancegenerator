<?php

namespace Database\Factories;

use App\Models\insurance;
use Illuminate\Database\Eloquent\Factories\Factory;

class InsuranceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = insurance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'passportNumber' => $this->faker->creditCardNumber,
            'days' => $this->faker->numberBetween(1, 365),
            'startdate' => $this->faker->dateTime,
            'prem' => $this->faker->numberBetween(1, 365),
            'summ' => $this->faker->numberBetween(1, 365),
            'fran' => $this->faker->numberBetween(1, 365),
            'polNumber' => $this->faker->numberBetween(1, 365),
            'type' => $this->faker->boolean,
            'createDate' => $this->faker->dateTime,
            'tel' => $this->faker->phoneNumber,
        ];
    }
}
