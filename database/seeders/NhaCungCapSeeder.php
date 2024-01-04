<?php

namespace Database\Seeders;

use App\Models\NhaCungCap;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NhaCungCapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //id=1
        $ncc = new NhaCungCap();
        $ncc->ten="Công ty ABC";
        $ncc->dia_chi="Quận 1, Thành phố Hồ Chí Minh 70000, Việt Nam";
        $ncc->email="abc@gmail.com";
        $ncc->so_dien_thoai="0865 921 651";
        $ncc->save();
        //id=2
        $ncc = new NhaCungCap();
        $ncc->ten="Công ty XYZ";
        $ncc->dia_chi="Quận 1, Thành phố Hồ Chí Minh 70000, Việt Nam";
        $ncc->email="xyz@gmail.com";
        $ncc->so_dien_thoai="0812 490 349";
        $ncc->save();
        //id=3
        $ncc = new NhaCungCap();
        $ncc->ten="Công ty DGH";
        $ncc->dia_chi="Quận 1, Thành phố Hồ Chí Minh 70000, Việt Nam";
        $ncc->email="dgh@gmail.com";
        $ncc->so_dien_thoai="0812 490 349";
        $ncc->save();

    }
}
