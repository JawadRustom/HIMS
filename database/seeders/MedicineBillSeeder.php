<?php

namespace Database\Seeders;

use App\Models\MedicineBill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicineBillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MedicineBill::factory(10)->create();
    }
}
