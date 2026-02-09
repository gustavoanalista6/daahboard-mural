<?php

namespace Database\Factories;

use App\Models\Servico;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServicoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Servico::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
        'value' => $this->faker->randomDigitNotNull,
        'first_fee_exemption' => $this->faker->word,
        'is_monthly' => $this->faker->word,
        'filial_id' => $this->faker->randomDigitNotNull
        ];
    }
}
