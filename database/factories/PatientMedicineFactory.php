<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Diagnosed;
use App\Models\Medicine;
use App\Models\PatientMedicine;

class PatientMedicineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PatientMedicine::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'MedicineID' => Medicine::factory(),
            'DiagnosedID' => Diagnosed::factory(),
            'MedicineCaliber' => $this->faker->numberBetween(1, 10000),
            'DosagePerDay' => $this->faker->numberBetween(1, 10000),
            'DaysCount' => $this->faker->numberBetween(1, 10000),
        ];
    }
}
