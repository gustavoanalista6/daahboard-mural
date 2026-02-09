<?php

namespace Database\Factories;

use App\Models\Filial;
use Illuminate\Database\Eloquent\Factories\Factory;

class FilialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Filial::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome_filial' => $this->faker->word,
        'foto_url_filial' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
