<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EquipmentType;

class EquipmentTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EquipmentType::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'Equipment_Type_Name' => $this->faker->word,
        ];
    }
}
