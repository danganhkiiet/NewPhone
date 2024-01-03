<?php

namespace Database\Seeders;
use App\Models\TrangThaiDonHang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrangThaiDonHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        $data = new TrangThaiDonHang();
        $data->ten = 'Chờ xác nhận';
        $data->save();

        $data1 = new TrangThaiDonHang();
        $data1->ten = 'Đã xác nhận';
        $data1->save();

        $data2 = new TrangThaiDonHang();
        $data2->ten = 'Đang vận chuyển';
        $data2->save();

        $data3 = new TrangThaiDonHang();
        $data3->ten = 'Thành công';
        $data3->save();

        $data4 = new TrangThaiDonHang();
        $data4->ten = 'Đã hủy';
        $data4->save();
    }
}
