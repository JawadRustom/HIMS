<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $Admin = User::create([
        'UserTypeId'=>'3',
        'NickName'=>'Patient1',
        'FirstName'=>'Patient1',
        'LastName'=>'Patient1',
        'email'=>'Patient1.Patient1@gmail.com',
        'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',//password
        'PhoneNumber'=>'0987372763',
    ]);
      $Admin = User::create([
        'UserTypeId'=>'3',
        'NickName'=>'Patient2',
        'FirstName'=>'Patient2',
        'LastName'=>'Patient2',
        'email'=>'Patient2.Patient2@gmail.com',
        'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',//password
        'PhoneNumber'=>'0987372763',
    ]);
      $Admin = User::create([
        'UserTypeId'=>'3',
        'NickName'=>'Patient3',
        'FirstName'=>'Patient3',
        'LastName'=>'Patient3',
        'email'=>'Patient3.Patient3@gmail.com',
        'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',//password
        'PhoneNumber'=>'0987372763',
        'Country'=>'Syria',
        'City'=>'Damascus',
    ]);
    }
}
