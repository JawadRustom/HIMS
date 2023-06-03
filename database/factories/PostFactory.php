<?php

namespace Database\Factories;

use Database\Seeders\PostSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $PostArray = ['News','Event'];
        return [
            'Title' => $this->faker->title(),
            'Text' => $this->faker->text(),
            'PostType' => $PostArray[rand(0,1)],
        ];
    }
}
