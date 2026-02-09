<?php

namespace Database\Factories;

use App\Models\Detalhe;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetalheFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Detalhe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
        'filial_id' => $this->faker->randomDigitNotNull,
        'curso_id' => $this->faker->randomDigitNotNull
        ];
    }
}
