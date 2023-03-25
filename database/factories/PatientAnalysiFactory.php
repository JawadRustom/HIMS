<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Analysi;
use App\Models\Patient;
use App\Models\PatientAnalysi;

class PatientAnalysiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PatientAnalysi::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'PatientID' => Patient::factory(),
            'AnalysisID' => Analysi::factory(),
            'AnalysisDate' => $this->faker->date(),
            'AnalysisRatio' => $this->faker->word,
            'AnalysisResult' => $this->faker->word,
        ];
    }
}
