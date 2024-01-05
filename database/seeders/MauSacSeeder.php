<?php

namespace Database\Seeders;

use App\Models\MauSac;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MauSacSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //id=1
        $ms=new MauSac();
        $ms->ten="Đen";
        $ms->save();
        //id-2
        $ms=new MauSac();
        $ms->ten="Đỏ";
        $ms->save();
        //id=3
        $ms=new MauSac();
        $ms->ten="Trắng";
        $ms->save();

    }
}
