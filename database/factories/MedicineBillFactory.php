<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Employee;
use App\Models\Medicine;
use App\Models\MedicineBill;

class MedicineBillFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MedicineBill::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'MedicineID' => Medicine::factory(),
            'EmployeeID' => Employee::factory(),
            'BillDate' => $this->faker->date(),
            'Quantity' => $this->faker->numberBetween(-10000, 10000),
            'BuyPrice' => $this->faker->numberBetween(-10000, 10000),
            'SalePrice' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
