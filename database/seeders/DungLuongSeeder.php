<?php

namespace Database\Seeders;

use App\Models\DungLuong;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DungLuongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //id=1
        $dl=new DungLuong();
        $dl->ten="128GB";
        $dl->save();
        //id-2
        $dl=new DungLuong();
        $dl->ten="256GB";
        $dl->save();
        //id=3
        $dl=new DungLuong();
        $dl->ten="512GB";
        $dl->save();
    }
}
