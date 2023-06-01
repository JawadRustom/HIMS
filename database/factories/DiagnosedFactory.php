<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Diagnosed;
use App\Models\Disease;
use App\Models\Employee;
use App\Models\Patient;
use App\Models\PatientAppointment;
use App\Models\PatientMedicine;

class DiagnosedFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Diagnosed::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'DoctoriD' => Employee::factory(),
            'PatientID' => Patient::factory(),
            'DiseaseID' => Disease::factory(),
            'Details' => $this->faker->word,
            'PatientAppointmentID' => PatientAppointment::factory(),
            'PatientMedicineID'=>PatientMedicine::factory(),
        ];
    }
}
