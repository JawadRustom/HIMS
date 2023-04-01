<?php

namespace Database\Seeders;

use App\Models\CertificationEmployee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CertificationEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CertificationEmployee::factory(10)->create();
    }
}
