<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhieuXuat extends Model
{
    use HasFactory;
    protected $table="phieu_xuat";

    public function khach_hang(){
        return $this->belongsTo(KhachHang::class);
    }

    public function trang_thai_don_hang(){
        return $this->belongsTo(TrangThaiDonHang::class);
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
