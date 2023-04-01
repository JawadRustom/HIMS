<?php

namespace Database\Seeders;

use App\Models\Analysi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnalysiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Analysi::factory(10)->create();
    }
}
