<?php

namespace Database\Seeders;

use App\Models\PatientSymptom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientSymptomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PatientSymptom::factory(10)->create();
    }
}
