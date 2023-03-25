<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Employee;
use App\Models\Equipment;
use App\Models\EquipmentBill;

class EquipmentBillFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EquipmentBill::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'EmployeeID' => Employee::factory(),
            'EquipmentID' => Equipment::factory(),
            'BillDate' => $this->faker->date(),
            'Quantity' => $this->faker->numberBetween(-10000, 10000),
            'Price' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
