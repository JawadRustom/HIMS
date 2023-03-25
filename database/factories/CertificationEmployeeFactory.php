<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Certification;
use App\Models\CertificationEmployee;
use App\Models\Employee;

class CertificationEmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CertificationEmployee::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'EmployeeID' => Employee::factory(),
            'CertificationID' => Certification::factory(),
        ];
    }
}
