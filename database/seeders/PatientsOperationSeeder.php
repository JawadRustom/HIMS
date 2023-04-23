<?php

namespace Database\Seeders;

use App\Models\PatientsOperation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientsOperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PatientsOperation::factory(10)->create();
    }
}
