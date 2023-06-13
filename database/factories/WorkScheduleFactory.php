<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Employee;
use App\Models\Room;
use App\Models\WorkSchedule;

class WorkScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WorkSchedule::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'EmployeeID' => Employee::factory(),
            'RoomID' => Room::factory(),
            'FromHour' => $this->faker->time('H:i:s'),
            'ToHour' => $this->faker->time('H:i:s'),
            'WorkDayName' => $this->faker->dayOfWeek(),
        ];
    }
}
