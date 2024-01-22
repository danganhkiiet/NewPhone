<?php

namespace Database\Seeders;

use App\Models\ThongSo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThongSoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //id=1
        $thong_so=new ThongSo();
        $thong_so->ten="Màn hình";
        $thong_so->save();
        //id=2
        $thong_so=new ThongSo();
        $thong_so->ten="Hệ điều hành";
        $thong_so->save();
        //id=3
        $thong_so=new ThongSo();
        $thong_so->ten="Camera sau";
        $thong_so->save();
        //id=4
        $thong_so=new ThongSo();
        $thong_so->ten="Camera trước";
        $thong_so->save();
        //id=5
        $thong_so=new ThongSo();
        $thong_so->ten="Chip";
        $thong_so->save();
        //id=7
        $thong_so=new ThongSo();
        $thong_so->ten="Dung lượng lưu trữ";
        $thong_so->save();
        //id=8
        $thong_so=new ThongSo();
        $thong_so->ten="SIM";
        $thong_so->save();
        //id=9
        $thong_so=new ThongSo();
        $thong_so->ten="Pin,Sạc";
        $thong_so->save();
    }
}
