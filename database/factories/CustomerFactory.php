<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'email' =>  $this->faker->unique()->safeEmail(),
            'data_nascimento' => $this->faker->date(),
            'telefone' => $this->faker->phoneNumber(),
            'cpf' => $this->faker->randomNumber(),
            'genero' => $this->faker->boolean(),

        ];
    }
}
