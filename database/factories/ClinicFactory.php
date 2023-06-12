<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Clinic;
use App\Models\Department;

class ClinicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Clinic::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'ClinicsType' => $this->faker->word,
            'DepartmentID' => Department::factory(),
            
        ];
        
    }
}
