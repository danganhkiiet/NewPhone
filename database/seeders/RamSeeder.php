<?php

namespace Database\Seeders;

use App\Models\Ram;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //id=1
        $ram= new Ram();
        $ram->ten="4GB";
        $ram->save();
        //id=2    
        $ram= new Ram();
        $ram->ten="6GB";
        $ram->save();
        //id=3
        $ram= new Ram();
        $ram->ten="8GB";
        $ram->save();
        //id=4
        $ram= new Ram();
        $ram->ten="16GB";
        $ram->save();
    }
}
