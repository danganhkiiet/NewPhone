<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDienThoai extends Model
{
    use HasFactory;
    protected $table="chi_tiet_dien_thoai";

    protected $hidden=['created_at','updated_at','deleted_at'];

    public function dienThoai(){
        return $this->belongsTo(DienThoai::class);
    }
    public function mauSac(){
        return $this->belongsTo(MauSac::class);
    }
    public function dungLuong(){
        return $this->belongsTo(DungLuong::class);
    }

}
