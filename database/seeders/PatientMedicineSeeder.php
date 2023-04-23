<?php

namespace Database\Seeders;

use App\Models\PatientMedicine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientMedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PatientMedicine::factory(10)->create();
    }
}
