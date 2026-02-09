<?php

namespace Database\Factories;

use App\Models\Curso;
use Illuminate\Database\Eloquent\Factories\Factory;

class CursoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Curso::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'filial_id' => $this->faker->word,
        'icon' => $this->faker->word,
        'category' => $this->faker->word,
        'subtitle' => $this->faker->word,
        'title' => $this->faker->word,
        'route' => $this->faker->word,
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
