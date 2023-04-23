<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Employee;
use App\Models\Operation;
use App\Models\Patient;
use App\Models\PatientsOperation;

class PatientsOperationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PatientsOperation::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'PatientID' => Patient::factory(),
            'DoctorID' => Employee::factory(),
            'AnesthesiologistID' => Employee::factory(),
            'OperationID' => Operation::factory(),
            'OperationDate' => $this->faker->date(),
            'DoctorCommission' => $this->faker->numberBetween(1, 10000),
        ];
    }
}
