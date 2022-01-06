<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(2),
            'year' => $this->faker->year(),
            'director' => $this->faker->name(),
            'protagonist' => $this->faker->name()
        ];
    }
}
