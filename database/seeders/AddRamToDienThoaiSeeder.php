<?php

namespace Database\Seeders;

use App\Models\ChiTietDienThoai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddRamToDienThoaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $ctdt=ChiTietDienThoai::all();
        foreach($ctdt as $ct)
        {
            $ct->ram_id=random_int(1,4);
            $ct->save();
        }
        
    }
}
