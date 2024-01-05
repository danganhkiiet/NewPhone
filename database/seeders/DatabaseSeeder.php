<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(AdminSeeder::class);
        $this->call(KhachHangSeeder::class);
        $this->call(MauSacSeeder::class);
        $this->call(DungLuongSeeder::class);
        $this->call(RamSeeder::class);
        $this->call(ThongSoSeeder::class);
        $this->call(NhaSanXuatSeeder::class);
        $this->call(NhaCungCapSeeder::class);
        $this->call(DienThoaiSeeder::class);
        $this->call(DienThoaiThongSoSeeder::class);
        $this->call(ChiTietDienThoaiSeeder::class);
        $this->call(TrangThaiDonHangSeeder::class);
    }
}
