<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Operation;

class OperationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Operation::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'OperationName' => $this->faker->word,
            'OperationPrice' => $this->faker->numberBetween(1, 10000),
        ];
    }
}
