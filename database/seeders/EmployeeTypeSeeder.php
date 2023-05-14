<?php

namespace Database\Seeders;

use App\Models\EmployeeType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $EmployeeType = EmployeeType::create([
          'Type'=>'Doctor',
        ]);
        $EmployeeType = EmployeeType::create([
          'Type'=>'Employee',
        ]);
        $EmployeeType = EmployeeType::create([
          'Type'=>'Hr',
        ]);
        $EmployeeType = EmployeeType::create([
          'Type'=>'Accountant',
        ]);
        $EmployeeType = EmployeeType::create([
          'Type'=>'Nurse',
        ]);
        $EmployeeType = EmployeeType::create([
          'Type'=>'Cleaner',
        ]);
        $EmployeeType = EmployeeType::create([
          'Type'=>'Engineer',
        ]);
    }
}
