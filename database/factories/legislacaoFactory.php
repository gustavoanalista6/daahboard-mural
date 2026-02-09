<?php

namespace Database\Factories;

use App\Models\legislacao;
use Illuminate\Database\Eloquent\Factories\Factory;

class legislacaoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = legislacao::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
        'url' => $this->faker->word,
        'order' => $this->faker->randomDigitNotNull,
        'filial_id' => $this->faker->randomDigitNotNull
        ];
    }
}
