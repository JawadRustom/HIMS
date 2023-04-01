<?php

namespace Database\Seeders;

use App\Models\Death;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeathSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Death::factory(10)->create();
    }
}
