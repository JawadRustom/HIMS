<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Equipment;
use App\Models\Room;
use App\Models\RoomContent;

class RoomContentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RoomContent::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'EquipmentID' => Equipment::factory(),
            'RoomID' => Room::factory(),
        ];
    }
}
