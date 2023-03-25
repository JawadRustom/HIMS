<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Equipment;
use App\Models\EquipmentType;

class EquipmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Equipment::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'EquipmentTypeID' => EquipmentType::factory(),
            'Details' => $this->faker->word,
            'CompanyName' => $this->faker->word,
        ];
    }
}
