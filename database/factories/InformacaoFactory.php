<?php

namespace Database\Factories;

use App\Models\Informacao;
use Illuminate\Database\Eloquent\Factories\Factory;

class InformacaoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Informacao::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
        'icon' => $this->faker->word,
        'filial_id' => $this->faker->randomDigitNotNull,
        'enable' => $this->faker->word,
        'route' => $this->faker->word,
        'url_pdf' => $this->faker->word
        ];
    }
}
