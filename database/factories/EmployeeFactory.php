<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Department;
use App\Models\Employee;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'NationalNumber' => $this->faker->word,
            'DepartmentID' => Department::factory(),
            'Address' => $this->faker->word,
            'HairDate' => $this->faker->date(),
            'BirthDate' => $this->faker->date(),
            'Gender' => $this->faker->word,
            'Salary' => $this->faker->numberBetween(-10000, 10000),
            'ManagerID' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
