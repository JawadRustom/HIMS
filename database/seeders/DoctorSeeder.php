<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Doctor = User::create([
            'UserTypeId'=>'2',
            'NickName'=>'Taha123',
            'FirstName'=>'Taha',
            'LastName'=>'Al-Mulla',
            'email'=>'Doctor.Doctor1@gmail.com',
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',//password
            'PhoneNumber'=>'0987372763',
            'Country'=>'Syria',
            'City'=>'Damascus',
        ]);
        $Doctor = User::create([
            'UserTypeId'=>'2',
            'NickName'=>'Thear123',
            'FirstName'=>'Thaer',
            'LastName'=>'Mohamad',
            'email'=>'Doctor.Doctor2@gmail.com',
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',//password
            'PhoneNumber'=>'0987372763',
            'Country'=>'Syria',
            'City'=>'Damascus',
        ]);
        $Doctor = User::create([
            'UserTypeId'=>'2',
            'NickName'=>'Sami123',
            'FirstName'=>'Sami',
            'LastName'=>'Ajaz',
            'email'=>'Doctor.Doctor3@gmail.com',
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',//password
            'PhoneNumber'=>'0987372763',
            'Country'=>'Syria',
            'City'=>'Damascus',
        ]);
    }
}
