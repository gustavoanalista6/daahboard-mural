<?php

namespace Database\Factories;

use App\Models\DetalheCurso;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetalheCursoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DetalheCurso::class;

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
        'url_pdf' => $this->faker->word,
        'filial_id' => $this->faker->randomDigitNotNull,
        'curso_id' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
