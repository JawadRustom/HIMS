<?php

namespace Database\Seeders;

use App\Models\PatientAnalysi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientAnalysiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PatientAnalysi::factory(10)->create();
    }
}
