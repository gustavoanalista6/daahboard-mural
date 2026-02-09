<?php

namespace Database\Factories;

use App\Models\Dirigente--fromTable;
use Illuminate\Database\Eloquent\Factories\Factory;

class Dirigente--fromTableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dirigente--fromTable::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
