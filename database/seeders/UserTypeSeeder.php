<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $UserType=UserType::create([
            'UserType'=>'Admin'
        ]);
        $UserType=UserType::create([
            'UserType'=>'Doctor'
        ]);
        $UserType=UserType::create([
            'UserType'=>'User'
        ]);
    }
}
