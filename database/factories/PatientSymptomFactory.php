<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Patient;
use App\Models\PatientSymptom;
use App\Models\Symptom;

class PatientSymptomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PatientSymptom::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'PatientID' => Patient::factory(),
            'SymptomID' => Symptom::factory(),
            'SymptomDate' => $this->faker->date(),
            'Description' => $this->faker->word,
        ];
    }
}
