<?php

namespace Database\Seeders;

use App\Models\NhaSanXuat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NhaSanXuatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //id=1
        $nsx=new NhaSanXuat();
        $nsx->ten="Iphone";
        $nsx->dia_chi="Mỹ";
        $nsx->email="iphone@gmail.com";
        $nsx->so_dien_thoai="0123456789";
        $nsx->save();
        //id=2
        $nsx2=new NhaSanXuat();
        $nsx2->ten="SamSung";
        $nsx2->dia_chi="Hàn Quốc";
        $nsx2->email="samsung@gmail.com";
        $nsx2->so_dien_thoai="0122341759";
        $nsx2->save();
        //id=3
        $nsx3=new NhaSanXuat();
        $nsx3->ten="Vivo";
        $nsx3->dia_chi="Trung Quốc";
        $nsx3->email="vivo@gmail.com";
        $nsx3->so_dien_thoai="0123412349";
        $nsx3->save();
        //id=4
        $nsx4=new NhaSanXuat();
        $nsx4->ten="Oppo";
        $nsx4->dia_chi="Trung Quốc";
        $nsx4->email="oppo@gmail.com";
        $nsx4->so_dien_thoai="0125555759";
        $nsx4->save();
        //id=5  
        $nsx5=new NhaSanXuat();
        $nsx5->ten="Realme";
        $nsx5->dia_chi="Trung Quốc";
        $nsx5->email="realme@gmail.com";
        $nsx5->so_dien_thoai="0121235759";
        $nsx5->save();
    }
}
