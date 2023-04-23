<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Patient;
use App\Models\User;

class PatientFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Patient::class;

  /**
   * Define the model's default state.
   */
  public function definition(): array
  {
    $array = ['female', 'male'];
    $ids = User::whereHas('UserType', fn ($query) => $query->where('UserType', 'Patient'))->pluck('id');
    // dd($ids);
    return [
      'user_id' => collect($ids)->random(),
      'NationalNumber' => $this->faker->regexify('[A-Z0-9]{10}'),
      'PatientStatus' => $this->faker->word,
      'Gender' => $array[rand(0, 1)],
      'BirthDate' => $this->faker->dateTime(),
      'PatientLength' => fake()->numberBetween(100, 210),
      'PatientWeight' => fake()->numberBetween(50, 125),
    ];
  }
}
