<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietPhieuXuat extends Model
{
    use HasFactory;
    protected $table="chi_tiet_phieu_xuat";

    public function chi_tiet_dien_thoai(){
        return $this->belongsTo(ChiTietDienThoai::class);
    }
    public function phieu_xuat()
    {
        return $this->belongsTo(PhieuXuat::class, 'phieu_xuat_id');
    }
}
