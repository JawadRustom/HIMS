<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Admin = User::create([
            'UserTypeId'=>'1',
            'NickName'=>'Jawad_Rus',
            'FirstName'=>'Jawad',
            'LastName'=>'Rustom',
            'email'=>'admin.admin1@gmail.com',
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',//password
            'PhoneNumber'=>'0987372763',
            'Country'=>'Syria',
            'City'=>'Damascus',
        ]);
        $Admin = User::create([
            'UserTypeId'=>'1',
            'NickName'=>'LoaiJd',
            'FirstName'=>'Loai',
            'LastName'=>'Judeh',
            'email'=>'admin.admin2@gmail.com',
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',//password
            'PhoneNumber'=>'0987372763',
            'Country'=>'Syria',
            'City'=>'Damascus',
        ]);
    }
}
