<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeType;
use App\Models\User;

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
        $FirstEmployeeTypeId = EmployeeType::first()->id;
        return [
            'user_id'=>User::factory(),
            'EmployeeTypeId'=>rand($FirstEmployeeTypeId,EmployeeType::count()),
            'NationalNumber' => $this->faker->word,
            'DepartmentID' => Department::factory(),
            'Address' => $this->faker->word,
            'HairDate' => $this->faker->date(),
            'BirthDate' => $this->faker->date(),
            'Gender' => $this->faker->word,
            'Salary' => $this->faker->numberBetween(1, 100000),
            'ManagerID' => rand(1,Employee::count()),
        ];
    }
}
