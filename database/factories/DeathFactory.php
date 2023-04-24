<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Death;
use App\Models\Patient;

class DeathFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Death::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'PatientID'=>Patient::factory(),
            'DeathDate' => $this->faker->date(),
        ];
    }
}
