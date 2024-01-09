<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DienThoai;
use App\Models\HinhAnh;
class HinhAnhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Lấy tất cả các điện thoại có dien_thoai_id khác null
         $dienThoais = DienThoai::all();

         foreach ($dienThoais as $dienThoai) {
             // Thêm hình ảnh cho mỗi điện thoại
            HinhAnh::create([
                 'dien_thoai_id' => $dienThoai->id,
                 'duong_dan' => "hinh_anh/kRNsHEEcHXKVAcXNAgtXI1NQNbd3krMtelUUa2t4.jpg",
             ]);
         }
    }
}
