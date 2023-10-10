<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => function () {
                return Customer::factory()->create()->id;
            },
            'name' => $this->faker->name(),
            'especie' => $this->faker->name(),
            'data_nascimento' => $this->faker->date(),
            'flagidoso'  => $this->faker->boolean(),
            'flagcardiopata' => $this->faker->boolean(),
            'flagepiletico' => $this->faker->boolean(),
            'flaglesionado' => $this->faker->boolean(),
            'flagalergico' => $this->faker->boolean(),
            'observacao' => $this->faker->text(),
        ];
    }
}
