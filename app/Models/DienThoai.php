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

    public function phieuNhap(){
        return $this->hasMany(PhieuNhap::class);
    }
    public function chiTietPhieuNhap(){
        return $this->hasMany(ChiTietPhieuNhap::class);
    }
}
