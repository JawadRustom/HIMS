<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\BloodBank;
use App\Models\Room;

class BloodBankFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BloodBank::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'Name' => $this->faker->word,
            'Type' => $this->faker->word,
            'Quantity' => $this->faker->numberBetween(-10000, 10000),
            'RoomID' => Room::factory(),
        ];
    }
}
