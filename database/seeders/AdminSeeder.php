<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table("admin")->insert([
        //    
        // ]);
        $admin = new Admin();
        $admin->ho_ten = "Dang Anh Kiet";
        $admin->email="danganhkiet@gmail.com";
        $admin->so_dien_thoai = "0786961131";
        $admin->password=Hash::make("12345");
        $admin->avatar="123";
        $admin->save();
    }
}
