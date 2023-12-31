<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Clinic;
use App\Models\Employee;
use App\Models\Patient;
use App\Models\PatientAppointment;

class PatientAppointmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PatientAppointment::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $ids = Employee::whereHas('EmployeeType', fn ($query) => $query->where('Type', 'Doctor'))->pluck('id');
        return [
            'PatientID' => Patient::factory(),
            'ClinicID' => Clinic::factory(),
            'doctor_id'=>collect($ids)->random(),
            'AppointmentDate' => $this->faker->date(),
        ];
    }
}
