<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Symptom;

class SymptomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Symptom::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'SymptomsName' => $this->faker->word,
        ];
    }
}
