<?php

namespace Database\Seeders;

use App\Models\KhachHang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class KhachHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $khach_hang = new KhachHang();
        $khach_hang->ten = "Dang Anh Kiet";
        $khach_hang->email="danganhkiet@gmail.com";
        $khach_hang->dia_chi = 'Quận 2 thành phố Hồ Chí Minh';
        $khach_hang->so_dien_thoai = "0786961131";
        $khach_hang->password=Hash::make("12345");
        $khach_hang->save();
    }
}
