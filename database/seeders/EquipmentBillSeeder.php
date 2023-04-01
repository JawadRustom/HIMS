<?php

namespace Database\Seeders;

use App\Models\EquipmentBill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipmentBillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EquipmentBill::factory(10)->create();
    }
}
