<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Certification;

class CertificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Certification::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'CertificationName' => $this->faker->word,
            'CertificationDonor' => $this->faker->word,
        ];
    }
}
