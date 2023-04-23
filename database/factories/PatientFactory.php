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
        $array=['female','male'];
        return [
            'NationalNumber' => $this->faker->regexify('[A-Z0-9]{10}'),
            'PatientStatus' => $this->faker->word,
            'Gender' => $array[rand(0,1)],
            'BirthDate' => $this->faker->dateTime(),
            'PatientLength' => fake()->numberBetween(100,210),
            'PatientWeight' => fake()->numberBetween(50,125),
        ];
    }
}
