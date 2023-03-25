<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Patient;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'NationalNumber' => $this->faker->word,
            'PatientStatus' => $this->faker->word,
            'Gender' => $this->faker->word,
            'BirthDate' => $this->faker->date(),
            'PatientLength' => $this->faker->word,
            'PatientWeight' => $this->faker->word,
        ];
    }
}
