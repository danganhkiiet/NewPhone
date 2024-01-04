<?php

namespace Database\Seeders;

use App\Models\DienThoai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DienThoaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //id=1
        $dt=new DienThoai();
        $dt->nha_san_xuat_id="1";
        $dt->ten="iPhone 11";
        $dt->save();
        //id=2
        $dt=new DienThoai();
        $dt->nha_san_xuat_id="1";
        $dt->ten="iPhone 12";
        $dt->save();
        //id=3
        $dt=new DienThoai();
        $dt->nha_san_xuat_id="1";
        $dt->ten="iPhone 13";
        $dt->save();
        //id=4
        $dt=new DienThoai();
        $dt->nha_san_xuat_id="1";
        $dt->ten="iPhone 14";
        $dt->save();
        //id=5
        $dt=new DienThoai();
        $dt->nha_san_xuat_id="1";
        $dt->ten="iPhone 15";
        $dt->save();
        //id=6
        $dt2=new DienThoai();
        $dt2->nha_san_xuat_id="2";
        $dt2->ten="SamSung - Galaxy S23 Ultra";
        $dt2->save();
        //id=7
        $dt2=new DienThoai();
        $dt2->nha_san_xuat_id="2";
        $dt2->ten="SamSung - Galaxy S23 FE";
        $dt2->save();
        //id=8
        $dt2=new DienThoai();
        $dt2->nha_san_xuat_id="2";
        $dt2->ten="SamSung - Galaxy Z Flip5 5G";
        $dt2->save();
        //id=9
        $dt2=new DienThoai();
        $dt2->nha_san_xuat_id="2";
        $dt2->ten="SamSung - Galaxy Z Fold5 5G";
        $dt2->save();
        //id=10
        $dt2=new DienThoai();
        $dt2->nha_san_xuat_id="2";
        $dt2->ten="SamSung - Galaxy S22 Ultra 5G";
        $dt2->save();
        //id=11
        $dt3=new DienThoai();
        $dt3->nha_san_xuat_id="3";
        $dt3->ten="vivo V29e 5G";
        $dt3->save();
        //id=12
        $dt3=new DienThoai();
        $dt3->nha_san_xuat_id="3";
        $dt3->ten="vivo Y36";
        $dt3->save();
        //id=13
        $dt3=new DienThoai();
        $dt3->nha_san_xuat_id="3";
        $dt3->ten="vivo V27e";
        $dt3->save();
        //id=14
        $dt3=new DienThoai();
        $dt3->nha_san_xuat_id="3";
        $dt3->ten="vivo Y22s";
        $dt3->save();
        //id=15
        $dt3=new DienThoai();
        $dt3->nha_san_xuat_id="3";
        $dt3->ten="vivo v29 5G";
        $dt3->save();
        //id=16
        $dt4=new DienThoai();
        $dt4->nha_san_xuat_id="4";
        $dt4->ten="OPPO Find N3 Flip 5G";
        $dt4->save();
        //id=17
        $dt4=new DienThoai();
        $dt4->nha_san_xuat_id="4";
        $dt4->ten="OPPO A38";
        $dt4->save();
        //id=18
        $dt4=new DienThoai();
        $dt4->nha_san_xuat_id="4";
        $dt4->ten="OPPO A57";
        $dt4->save();
        //id=19
        $dt4=new DienThoai();
        $dt4->nha_san_xuat_id="4";
        $dt4->ten="OPPO Reno10 5G";
        $dt4->save();
        //id=20
        $dt4=new DienThoai();
        $dt4->nha_san_xuat_id="4";
        $dt4->ten="OPPO A18";
        $dt4->save();
        //id=21
        $dt5=new DienThoai();
        $dt5->nha_san_xuat_id="5";
        $dt5->ten="realme C67";
        $dt5->save();
        //id=22
        $dt5=new DienThoai();
        $dt5->nha_san_xuat_id="5";
        $dt5->ten="realme C55";
        $dt5->save();
        //id=23
        $dt5=new DienThoai();
        $dt5->nha_san_xuat_id="5";
        $dt5->ten="realme 11";
        $dt5->save();
        //id=24
        $dt5=new DienThoai();
        $dt5->nha_san_xuat_id="5";
        $dt5->ten="realme 11 Pro+ 5G";
        $dt5->save();
        //id=25
        $dt5=new DienThoai();
        $dt5->nha_san_xuat_id="5";
        $dt5->ten="realme 11 Pro 5G";
        $dt5->save();
    }
}
