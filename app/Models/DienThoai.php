<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DienThoai extends Model
{
    use HasFactory;
    protected $table="dien_thoai";

    public function nha_san_xuat(){
        return $this->belongsTo(NhaSanXuat::class);
    }
    public function chi_tiet_dien_thoai(){
        return $this->hasMany(ChiTietDienThoai::class);
    }
    public function phieuNhap(){
        return $this->hasMany(PhieuNhap::class);
    }
    public function chiTietPhieuNhap(){
        return $this->hasMany(ChiTietPhieuNhap::class);
    }
    public function chiTietDienThoai(){
        return $this->hasMany(ChiTietDienThoai::class);
    }
    public function hinhAnh(){
        return $this->hasMany(HinhAnh::class);
    }
}
