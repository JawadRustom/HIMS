<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\UserType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([

            UserTypeSeeder::class,
            UserSeeder::class,
            PatientSeeder::class,
            DepartmentSeeder::class,
            AnalysiSeeder::class,
            CertificationSeeder::class,
            DiseaseSeeder::class,
            EquipmentTypeSeeder::class,
            MedicineSeeder::class,
            RoomSeeder::class,
            SymptomSeeder::class,
            OperationSeeder::class,
            EmployeeSeeder::class,
            BloodBankSeeder::class,
            CertificationEmployeeSeeder::class,
            ClinicSeeder::class,
            DeathSeeder::class,
            DiagnosedSeeder::class,
            EquipmentSeeder::class,
            EquipmentBillSeeder::class,
            MedicineBillSeeder::class,
            AdminSeeder::class,
            DoctorSeeder::class,
        ]);
    }
}
