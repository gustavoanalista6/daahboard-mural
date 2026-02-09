<?php

namespace Database\Factories;

use App\Models\Dirigente;
use Illuminate\Database\Eloquent\Factories\Factory;

class DirigenteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dirigente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'position' => $this->faker->word,
        'order' => $this->faker->randomDigitNotNull,
        'name' => $this->faker->word,
        'filial_id' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
