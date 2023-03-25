<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Analysi;

class AnalysiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Analysi::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'AnalysisName' => $this->faker->word,
        ];
    }
}
