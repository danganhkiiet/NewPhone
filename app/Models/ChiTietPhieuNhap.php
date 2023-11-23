<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietPhieuNhap extends Model
{
    use HasFactory;
    protected $table="chi_tiet_phieu_nhap";
    public function dienThoai(){
        return $this->belongsTo(DienThoai::class);
    }
}
